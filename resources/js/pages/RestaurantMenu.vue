<template>
    <div>
        <h1>{{ restaurant.name }}</h1> 
        <div class="row">
            <div class="col col-sm-6">
                
                <div class="py-4" v-for="food in menu" :key="food.id">
                    <a href="#">
                        {{food.name}}
                    </a>
                    <button class="btn border mx-2" @click="changeValue(food, 'subtract')">
                        -
                    </button>
                    <span>
                        {{food.quantity}}
                    </span>
                    <button class="btn border mx-2" @click="changeValue(food, 'add')">
                        +
                    </button>
                    <button class="btn m_button" @click="addItemCart(food)" :disabled="food.quantity === 0" >
                        Aggiungi al carrello
                    </button>
                </div>
            </div>

            <div class="col col-sm-6">
                <Cart :selectedElement="selectedElement" />
            </div>
        </div>
    </div>    
</template>

<script>
import Cart from '../components/Cart.vue';

export default {
    name: 'RestaurantMenu',
    components: {
        Cart
    },
    data: function() {
        return {
            menu: [],
            restaurant: '',
            selectedElement: [],
        }
    },
    methods: {
        getMenu: function() {

            axios.get('/api/restaurant/' + this.$route.params.slug)
            .then((response) => {

                this.restaurant = response.data.results;

                response.data.results.foods.forEach(element => {
                    element['quantity'] = 0;
                });

                this.menu = response.data.results.foods;
            });

        },
        addItemCart: function(element){

            /* Se la quantità selezionatà è pari a 0 non viene aggiunto l'elemento al carrello e compare un alert
                altrimenti viene aggiunta dopo aver verificato che non sia già presente */
                
            if(element.quantity <= 0) {
                alert('Hai selezionato una quantità non valida');
            } else {
                if(this.selectedElement.includes(element))  {
                    this.selectedElement.splice(this.selectedElement.indexOf(element), 1);
                }
                this.selectedElement.push(element);
            }
            
            // console.log(this.selectedElement);

        },
        changeValue: function(food, submitType){
            // console.log(food);
            this.menu.forEach(element => {

                if(element.id === food.id){

                    if(submitType === 'subtract'){

                        if (element.quantity !== 0) {
                            food.quantity--;

                            this.$forceUpdate();
                        }
                    } else {
                        food.quantity++;

                        this.$forceUpdate();
                    }
                }   
            });
        },
    },
    created: function() {
        this.getMenu();
    }
}
</script>

<style>

</style>