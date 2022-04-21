<template>
    <div class="container">
        <div class="wrapping-restaurant " >
            <h1 class="font-weight-bold">{{ restaurant.name }}</h1>
            <div class="restaurant-info">
                <span class="font-weight-bold">Indirizzo:</span><span class="spec-info">{{ restaurant.address }}</span>
                <span class="font-weight-bold">Telefono:</span><span class="spec-info">{{ restaurant.phone_number }}</span>
            </div>
            <div class="row">
                <div class="col selected-quantity">
                    <div class="foods-box row row-cols-md-1 row-cols-lg-3">
                        <div class="py-4 cards-box" v-for="food in menu" :key="food.id">

                            <!-- card -->
                            <div class="card">
                                <div class="img-wrapping-card">
                                    <img class="card-img-top" :src="food.img" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{food.name}}</h5>
                                    <p class="card-text">{{food.descriptions}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    
                                    <li class="list-group-item"> <strong>Ingredienti: </strong>{{ food.ingrediants }}</li>
                                    <li class="list-group-item "><strong>Prezzo: </strong> {{food.price}} €</li>
                                </ul>
                                <div class="card-body">
                                    <!-- <a href="#" class="card-link">Card link</a> -->
                                    <!-- <a href="#" class="card-link">Another link</a> -->
                                    <div class="text-center">
                                        <button class="btn border mx-2" @click="changeValue(food, 'subtract')">
                                            -
                                        </button>
                                        <span>
                                            {{ food.quantity }}
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

                <div>
                    <Cart :selectedElement="selectedElement" @amount="receiveAmount" />
                </div>
            </div>
        
        </div>
    </div>    
</template>

<script>
import Cart from '../components/Cart.vue';

export default {
    name: 'RestaurantMenu',
    components: {
        Cart,
    },
    data: function() {
        return {
            menu: [],
            restaurant: '',
            selectedElement: [],
            totalAmount: 0,
        }
    },
    methods: {
        getMenu: function() {

            axios.get('/api/restaurant/' + this.$route.params.slug)
            .then((response) => {

                this.restaurant = response.data.results;

                response.data.results.foods.forEach(element => {
                    if (isNaN(element['quantity'])){
                        element['quantity'] = 0;
                    }
                    
                });

                this.menu = response.data.results.foods;


                this.getFoodQuantityFromCart();
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

            console.log(this.selectedElement);
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
        receiveAmount(totalAmount) {
            // receive emit from Cart 
            this.totalAmount = totalAmount;
        },
        getFoodQuantityFromCart: function(){


            this.menu.forEach(element => {
                let item = this.selectedElement.find(item => item.id === element.id);

                if (item != undefined){
                    element.quantity = item.quantity;
                    console.log(element.quantity);
                } else {
                    element.quantity = 0;
                }
            });
        }
    },
    created: function() {
        this.getMenu();
    },
    watch: {
        selectedElement: {
            handler() {
                console.log('Selected Element array changed!');

                localStorage.setItem('selectedElement', JSON.stringify(this.selectedElement));


                // IF per ordinare solamente da 1 ristorante per volta.
                this.selectedElement.forEach(element => {
                    let item = this.selectedElement.find(item => item.restaurant_id != element.restaurant_id);
                    if (item != undefined) {
                        localStorage.clear();
                        this.selectedElement=[];
                        this.selectedElement.push(item);
                    }
                });
                
                this.getFoodQuantityFromCart();

            },
            deep: true,
        },
        totalAmount: {
            handler() {
                // emit to App vue 
                this.$emit('amount', this.totalAmount);
                this.$emit('selectedElement', this.selectedElement);
            }
        },
    },
    mounted(){
        console.log('App Mounted');

        if (localStorage.getItem('selectedElement')){  
            this.selectedElement = JSON.parse(localStorage.getItem('selectedElement'));
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
.wrapping-restaurant{
    padding: 50px;
    .restaurant-info {
        .spec-info {
            margin: 0 10px;
        }
    }
    .row{
        justify-content: center;
        .selected-quantity{
            // border-right: 1px solid rgba($color: #000000, $alpha: 0.35);
            min-height: 100%;

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
.card-title {
    border: 1px solid rgba($color: #000000, $alpha: 0.5);
    color: $primary-color;
    padding: 5px 10px;
    border-radius: 10px;
    margin: 20px 0px;
    text-align: center;
}

// img wrapping card
// img wrapping
.img-wrapping-card{
    width: 100%;
    height: 200px;

    img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
}
</style>>
