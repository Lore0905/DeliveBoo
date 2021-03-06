<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Food;
use App\Type;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        // faccio una query sul model Food per stampare tutti i foods del ristorante che è loggato
        $foods = Food::where('restaurant_id', '=', Auth::user()->restaurant->user_id)->orderBy('name')->get();

        $data = [
            'foods' => $foods
        ];

        return view('admin.foods.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foods_data = $request->all();

        // Validation
        $request->validate($this->foodValidationRules());

        $new_food = new Food();

        $new_food->fill($foods_data);

        // Funzione Slug
        $new_food->slug = $this->getUniqueSlugFromName($new_food->name);

        // Funzione per restaurant_id
        $user = Auth::user();

        $new_food->restaurant_id = $user->restaurant->id;

        // Storage Immagine
        if (isset($foods_data['img'])){
            $img_path = Storage::put('image', $foods_data['img']);
            $new_food->img = $img_path;
        }

        $new_food->save();

        return redirect()->route('admin.foods.show', ['food' => $new_food->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);
        $user = Auth::user();

        if($food->restaurant->user->id !== $user->id ) {
            abort(404);
        }
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $user = Auth::user();
        if($food->restaurant->user->id !== $user->id ) {
            abort(404);
        }

        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foods_data = $request->all();
        $request->validate($this->foodValidationRules());

        $food = Food::findOrFail($id);

        if($foods_data['name'] != $food->name){
            $foods_data['slug'] = $this->getUniqueSlugFromName($foods_data['name']);
        }
        
        if(isset($foods_data['img'])) {

            // delete old file 
            if($food->img) {
                Storage::delete($food->img);
            }

            // upload new file 
            $img_path = Storage::put('image', $foods_data['img']);

            // path to column
            $foods_data['img'] = $img_path;
        }

        $food->update($foods_data);

        return redirect()->route('admin.foods.show', ['food' => $food->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // Trova il foods con l'id passato
        $food = Food::findOrFail($id);

        // Eliminare la foto insieme al piatto
        if ($food->img) {
            Storage::delete($food->img);
        }

        // Elimino il food
        $food->delete();

        return redirect()->route('admin.foods.index');
    }

    protected function foodValidationRules()
    {
        return[
            'name' => 'required|max:20',
            'img' => 'image|max:1000',
            'descriptions' => 'required|',
            'ingrediants' => 'required|max:220',
            'price' => 'required|numeric',
            'visible' => 'between:0,1'
        ];
    }

    // Funzione per lo slug
    protected function getUniqueSlugFromName($name) {
        // Controlliamo se esiste già un post con questo slug.
        $slug = Str::slug($name);
        $slug_base = $slug;
        
        $restaurant_found = Food::where('slug', '=', $slug)->first();
        $counter = 1;
        while($restaurant_found) {
            // Se esiste, aggiungiamo -1 allo slug
            // ricontrollo che non esista lo slug con -1, se esiste provo con -2
            $slug = $slug_base . '-' . $counter;
            $restaurant_found = Food::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
