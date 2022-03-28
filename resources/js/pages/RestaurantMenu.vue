<template>
  <div>
    <div class="col col-6">
        <h1>{{ restaurant.name }}</h1>
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
            <button @click="addItemCart(food)" class="btn">
                Add
            </button>
        </div>
    </div>

    <div class="col col-6">
        <Cart :selectedElement="selectedElement" />
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

            // this.selectedElement.push(element);


            // Se un utent riclicka su un elemento già cliccato
            
            if(!this.selectedElement.includes(element)){
                this.selectedElement.push(element);
            }

            console.log(this.selectedElement);

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