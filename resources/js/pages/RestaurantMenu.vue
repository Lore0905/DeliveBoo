<template>
    <div>
        <header>
            <Header/>
        </header>
        <div class="wrapping-restaurant" >
            <h1>{{ restaurant.name }}</h1>
            <div class="restaurant-info">
                <span class="font-weight-bold">Indirizzo:</span><span class="spec-info">{{ restaurant.address }}</span>
                <span class="font-weight-bold">Telefono:</span><span class="spec-info">{{ restaurant.phone_number }}</span>
            </div>
            <div class="row">
                <div class="col col-9 col-sm-9 selected-quantity">
                    <div class="foods-box row row-cols-md-1 row-cols-lg-3">
                        <div class="py-4 cards-box" v-for="food in menu" :key="food.id">

                            <!-- card -->
                            <div class="card">
                                <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
                                <div class="card-body">
                                    <h5 class="card-title">{{food.name}}</h5>
                                    <p class="card-text">{{food.descriptions}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    
                                    <li class="list-group-item">Ingredienti: {{ food.ingrediants }}</li>
                                    <li class="list-group-item">Prezzo: {{food.price}} €</li>
                                </ul>
                                <div class="card-body">
                                    <!-- <a href="#" class="card-link">Card link</a> -->
                                    <!-- <a href="#" class="card-link">Another link</a> -->
                                    <div class="text-center">
                                        <button class="btn border mx-2" @click="changeValue(food, 'subtract')">
                                            -
                                        </button>
                                        <span>
                                            {{food.quantity}}
                                        </span>
                                        <button class="btn border mx-2" @click="changeValue(food, 'add')">
                                            +
                                        </button>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn m_button" @click="addItemCart(food)" :disabled="food.quantity === 0" >
                                            Aggiungi al carrello
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                    </div>
                </div>

                <div class="col col-3 col-sm-3">
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
            totalAmmount: 0,
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

    }
}
</script>

<style lang="scss" scoped>
.wrapping-restaurant{
    padding: 50px;
    h1{
        // margin-left: 50px;
    }
    .restaurant-info {
        .spec-info {
            margin: 0 10px;
        }
    }
    .row{
        justify-content: center;
        .selected-quantity{
            border-right: 1px solid black;

            .foods-box {
                // display: flex;
                // flex-wrap: wrap;
                // justify-content: space-between;

                .cards-box {
                    // width: calc(100% / 3);
                    .card {
                        margin: 10px;
                    }
                }
            }
        }
        
    }
}
</style>>
