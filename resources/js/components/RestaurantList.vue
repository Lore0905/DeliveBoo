<template>
    <div class="restaurant-list">
        <!-- Primo ciclo for -->
        <div class="row" v-for="restaurant in restaurants" :key="restaurant.id">

            <!-- Secondo ciclo for -->
            <div class="col" v-for="item in restaurant" :key="item.id">

                <div class="single-box">

                    <div class="box-details">

                        <!-- Immagine -->
                        <div class="image">
                            <img :src="item.image" alt="">
                        </div>

                        <!-- Nome -->
                        <div class="name">
                            {{item.name}}
                        </div>

                        <!-- Indirizzo -->
                        <div class="address">
                            <i class="fas fa-map-marker-alt"></i>
                            {{item.address}}
                        </div>

                        <!-- Numero telefonico -->
                        <div class="phone">
                            <i class="fas fa-phone-alt"></i>
                            {{item.phone_number}}
                        </div>

                        <!-- Link -->
                        <router-link class="link-to link" :to="{name: 'restaurant-menu', params: {slug: item.slug} }">
                            Vai al menù
                        </router-link>

                    </div>    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'RestaurantList',
        props: {
            restaurants: Array,
        },
        data: function(){
            return{

            }
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

.restaurant-list{
    color: $secondary_color;

    .single-box{

        .box-details{
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid black;

            .image{
                width: 100%;
                height: 100%;
            }

            .name{
                font-size: 20px;
                font-weight: 600;
                margin-bottom: 5px;
            }

            .address, .phone{
                margin-bottom: 5px;
            }

            .link{
                text-transform: uppercase;
                color: $secondary_color;
            }

        }
    }
}
</style>