<template>
    <div class="container mb-3 mt-3 restaurant-list">

        <!-- {{-- Titolo --}} -->
        <div v-if="restaurants.length > 0" class="restaurants-title m-3">
            Ecco i ristoranti che possono fare al caso tuo:
        </div>

        <div class="col" v-for="item in restaurants" :key="item.id">

            <div class="single-box">

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <!-- Image -->
                            <img :src="item.image" class="img-fluid rounded-start" :alt="item.name + ' image'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <!-- Name -->
                                <h5 class="card-title">{{ item.name }}</h5>

                                <!-- Tag type  -->
                                <div class="d-flex flex-wrap mb-2 types-box">
                                    <span class="mr-2 mb-1 single-type" :class="element.slug" v-for="element in item.types" :key="element.id"> {{element.name}} </span>
                                </div>

                                <!-- Address -->
                                <p class="card-text">{{ item.address }}</p>

                                <!-- Phone -->
                                <p class="card-text"><small class="text-muted"><i class="fas fa-phone-alt"></i> {{ item.phone_number }}</small></p>

                                <!-- Link -->
                                <router-link class="float-right btn btn-secondary" :to="{name: 'restaurant-menu', params: {slug: item.slug} }">
                                    Vai al menù
                                </router-link>

                            </div>
                        </div>
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
@import '../../sass/_bootstrap_variables.scss';

.restaurant-list{
    color: $secondary_color;

    .restaurants-title{
        font-size: $components_title;
        font-weight: 600;
        font-style: italic;
        color: $secondary_color;
    }

    .single-box{

        .card-body {
            .types-box {
                .single-type {
                    // background-color: $primary_color;
                    border-radius: 10px;
                    padding: 2px 3px;
                    text-transform: capitalize;
                    font-size: 12px;
                    font-family: $font-family-sans-serif;
                    color: white;
                    
                    &.italiano {
                        background-color: $blue;
                    }
                    &.internazionale {
                        background-color: $indigo;
                    }
                    &.cinese {
                        background-color: $purple;
                    }
                    &.giapponese {
                        background-color: $pink;
                    }
                    &.messicano {
                        background-color: $red;
                    }
                    &.indiano {
                        background-color: $orange;
                    }
                    &.americano {
                        background-color: $green;
                    }
                    &.thailandese {
                        background-color: $green;
                    }
                    &.vegetariano {
                        background-color: $blue;
                    }
                    &.sushi {
                        background-color: $indigo;
                    }
                    &.greco {
                        background-color: $purple;
                    }
                    &.pokeria {
                        background-color: $pink;
                    }
                    &.fast-food {
                        background-color: $red;
                    }
                    &.pizza {
                        background-color: $orange;
                    }
                }
            }
        }
        // .box-details{
        //     margin: 10px;
        //     display: flex;
        //     flex-direction: column;
        //     align-items: center;
        //     justify-content: center;
        //     border: 1px solid black;

        //     .image{
        //         width: 100%;
        //         height: 100%;
        //     }

        //     .name{
        //         font-size: 20px;
        //         font-weight: 600;
        //         margin-bottom: 5px;
        //     }

        //     .address, .phone{
        //         margin-bottom: 5px;
        //     }

        //     .link{
        //         text-transform: uppercase;
        //         color: $secondary_color;
        //     }

        // }
    }
}
</style>