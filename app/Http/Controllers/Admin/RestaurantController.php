<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use App\Restaurant;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function create()
    {
        $types = Type::all();

        $data = [
            'types' => $types,
        ];

        $user = Auth::user();

        // if (isset($user->restaurant->user_id)) {
        //     // return view('admin.restaurant.show', ['id' => $user->restaurant->id]);
        //     return '404';
        // } else {
        //     return view('admin.restaurant.create', $data);
        // }

        return view('admin.restaurant.create', $data);
        
    }

    public function store(Request $request)
    {
        $form_data = $request->all();

        // Funzione validation
        $request->validate($this->getValidationRules());

        $new_restaurant = new Restaurant();

        $new_restaurant->fill($form_data);

        // Funzione Slug
        $new_restaurant->slug = $this->getUniqueSlugFromName($new_restaurant->name);
        
        // Funzione User
        $user = Auth::user();
        $new_restaurant->user_id = $user->id;

        // Storage Immagine
        if (isset($form_data['image'])){
            $img_path = Storage::put('image', $form_data['image']);
            $new_restaurant->image = $img_path;
        }

        $new_restaurant->save();

        // Funzione Types
        if (isset($form_data['types'])) {
            $new_restaurant->types()->sync($form_data['types']);
        }

        return redirect()->route('admin.restaurant.show', ['id' => $new_restaurant->id]);
    }

    public function show($id) {

        $restaurant_to_show = Restaurant::findOrFail($id);
        $user = Auth::user();
        if($restaurant_to_show->user->id !== $user->id) {
            abort('404');
        }
        return view('admin.restaurant.show', compact('restaurant_to_show'));
    }

    // Funzione per la validazione
    protected function getValidationRules()
    {
        return [
            'name' => 'required|max:255',
            'image' => 'image|max:1000',
            'address' => 'required|max:255',
            'vat' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'types' => 'required|exists:types,id'
        ];
    }

    // Funzione per lo slug
    protected function getUniqueSlugFromName($name) {
        // Controlliamo se esiste già un post con questo slug.
        $slug = Str::slug($name);
        $slug_base = $slug;
        
        $restaurant_found = Restaurant::where('slug', '=', $slug)->first();
        $counter = 1;
        while($restaurant_found) {
            // Se esiste, aggiungiamo -1 allo slug
            // ricontrollo che non esista lo slug con -1, se esiste provo con -2
            $slug = $slug_base . '-' . $counter;
            $restaurant_found = Restaurant::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
