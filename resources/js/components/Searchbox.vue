<template>
  <div>
        <div class="wrapping-serchbox">
            <div class="container">
                <div class="row">

                    <!-- COL -->
                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-6">

                        <!-- title -->
                        <h1>I piatti che ami, a domicilio.</h1>

                        <!-- <div>
                            <div v-for="restaurant in restaurants" :key="restaurant.id">
                                <div v-for="items in restaurant" :key="items.id">
                                    <div v-for="item in items" :key="item.id">
                                        <router-link class="link-to" :to="{name: 'restaurant-menu', params: {slug: item.slug} }">{{item.name}}</router-link>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- select -->
                        <div class="wrapping-select">
                            <h6>Scegli la tipologia di ristorante che vuoi cercare</h6>

                            <div class="row">
                                <div class="col">

                                    <div class="dropdown-test">
                                        <button class="search-button" @click="displaySearch = !displaySearch" >
                                            <i class="fas fa-search"></i>
                                            <span>Cerca qualcosa</span>
                                        </button>
                                        <div class="search-menu" :class=" displaySearch == true ? 'active' : '' ">
                                            <div class="type-box my-1 mx-1" v-for="type in types" :key="type.id">

                                                <!-- new // test -->
                                                <label :for="'single-type-' + type.id">{{type.name}}</label>
                                                <input @click="getTypeValue(type.id)" type="checkbox" :id="'single-type-' + type.id" value="type.id">
                                            </div>

                                            <!-- test button to get filtered restaurants -->
                                            <div>
                                                <button class="btn ms_btn" @click="getRestaurants(), displaySearch = false">Cerca</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- COL -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <img src="https://cwa.roocdn.com/_next/static/media/campaign.df080c2b8ecbb022c066558c655167a1.svg" alt="">
                    </div>
                </div>
                
            </div>
        </div>

        <div class="restaurants-container">
            <RestaurantList :restaurants="restaurants" />
        </div>
        
  </div>
</template>

<script>
import RestaurantList from './RestaurantList.vue';

export default {
    name: "Serchbox",
    components: {
        RestaurantList,
    },
    data: function(){
        return{
            types : [],
            array_types_id : [],
            restaurants: [],
            restaurantsType: [],
            displaySearch: false,
        }
    },
    methods: {
        getTypes: function(){

            axios.get('/api/types')
            .then((response) => {
                this.types = response.data.types;
            });

        },
        getRestaurants: function(){

            // svuota l'array prima di una nuova chiamata 
            this.restaurants = [];

            this.array_types_id.forEach(type => {

                axios.get('/api/restaurants/' + type)
                .then((response) =>{

                    response.data.restaurants.forEach(element => {
                        let item = this.restaurants.find(item => item.id === element.id);
                        if (item === undefined){
                            this.restaurants.push(element);
                        }
                    });
                   
                });

            });
        },
        getTypeValue: function(n) {
            // n argument: is a number
            if(!this.array_types_id.includes(n)) {
                this.array_types_id.push(n);
            } else {
                // indexOf() dichiara l'indice di n presente nell'array , passandoglielo come argomento.  
                this.array_types_id.splice(this.array_types_id.indexOf(n), 1);
            }
        }
    },
    created: function(){
        this.getTypes();
    }
}
</script>

<style lang="scss">
@import '../../sass/partials/_variables.scss';

@keyframes growDown {
    0% {
        opacity: 0;
        transform: scaleY(0)
    }
    100% {
        opacity: 1;
        transform: scaleY(1)
    }
}

@keyframes reverseGrowDown {
    0% {
        opacity: 1;
        transform: scaleY(1)
    }
    100% {
        opacity: 0;
        transform: scaleY(0)
    }
}

.wrapping-serchbox{
    background-color: $primary_color;
    min-width: 100%;
    overflow: hidden;
    position: relative;
    padding: 50px 0px;
    
    .container{
        
        .row{
            .col{
                margin-bottom: 20px;
                // title
                h1{
                    color: black;
                    font-weight: 600;
                    text-align: center;
                    padding-bottom: 10px;
                }
                // select
                .wrapping-select{
                    background-color: white;
                    padding: 20px 50px;
                    border-radius: 10px;
                    text-align: center;
                    z-index: 100;
                    
                    h6{
                        text-align: center;
                        padding-bottom: 10px;
                    }
                    .row {
                        .col {
                            .ms_btn {
                                background-color: $primary_color;
                                color: white;
                            }
                        }
                    }

                }
            }
        }
    }

    // #background-wave{
    //     position: absolute;
    //     bottom: 0px;
    //     width: 100%;
    //     height: 100%;
    // }

    // Custom Popup select menu TEST
    .dropdown-test{
        position: relative;
    }
    .search-menu{
        display: none;
        position: absolute;
        text-transform: capitalize;
        z-index: 2;
        top: 60px;
        left: 0;

        width: 100%;

        background-color: white;
        color: $secondary_color;

        padding: 10px 15px;

        border-radius: 10px;
        border: 1px solid lightgray;

        -webkit-box-shadow: 5px 5px 15px -5px #000000; 
        box-shadow: 5px 5px 15px -5px #000000;

        animation: reverseGrowDown 500ms linear;
        transform-origin: center top;
    }
    .search-menu.active{
        display: flex;
        flex-flow: row wrap;
        justify-content: space-around;
        align-items: space-around;
        animation: growDown 500ms linear;
        transform-origin: top center;
    }
    button{
        padding: 0 10px;
        color: $secondary_color;
        text-decoration: none;
        background-color: white;
        border-radius: 10px;
        padding: 10px 15px;
        border: 2px solid lightgray;
        font-weight: 300;

        &:hover{
            border: 2px solid lightgray;
        }

        i{
            color: $primary_color;
            padding-right: 5px;
        }
    }
}
.restaurants-container{
    background-color: #fff;
    min-width: 100%;
    overflow: hidden;
    padding: 50px 0px;
}


</style>