<template>
    <div>
        <header>
            <Header/>
        </header>
        <div class="wrapping-restaurant" >
            <h1>{{ restaurant.name }}</h1> 
            <div class="row">
                <div class="col col-sm-6 selected-quantity">
                    <div class="py-4" v-for="food in menu" :key="food.id">

                        <!-- card -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{food.name}}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                        <!-- card -->
                    
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
    </div>    
</template>

<script>
import Cart from '../components/Cart.vue';
import Header from '../components/Header.vue';

export default {
    name: 'RestaurantMenu',
    components: {
        Cart,
        Header
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
                    
            // console.log(this.selectedElement.map(element=>element.id));
            
            // console.log(this.selectedElement.findIndex(element => element.id === '1'));

            let item = this.selectedElement.find(item => item.id === element.id);

            console.log(item);
                
            if(element.quantity <= 0) {
                alert('Hai selezionato una quantità non valida');
            } else {
                if( item != undefined ){
                    this.selectedElement.splice(this.selectedElement.indexOf(item), 1);
                }
                
                this.selectedElement.push(element);
            }

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
    },
    watch: {
        selectedElement: {
            handler() {
                console.log('Selected Element array changed!');

                localStorage.setItem('selectedElement', JSON.stringify(this.selectedElement));
            },
            deep: true,
        },
    },
    mounted(){
        console.log('App Mounted');

        if (localStorage.getItem('selectedElement')){  
            this.selectedElement = JSON.parse(localStorage.getItem('selectedElement'));
        }

        // console.log(selectedElement.id);
    }
}
</script>

<style lang="scss" scoped>
.wrapping-restaurant{
    padding: 50px;
    h1{
        margin-left: 50px;
    }

    .row{
        justify-content: center;
        .selected-quantity{
            border-right: 1px solid black;
        }
        
    }
}
</style>>
