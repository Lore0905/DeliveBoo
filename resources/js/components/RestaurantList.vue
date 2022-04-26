<template>
    <div  v-if="restaurants.length > 0" id="wrapping-restaurant-list" @click="getRisolution()">
        <div class=" mb-3 mt-3 restaurant-list">

            <!-- {{-- Titolo --}} -->
            <div class="restaurants-title m-3">
                Ecco i ristoranti che possono fare al caso tuo:
            </div>

            <div class="col" v-for="item in restaurants" :key="item.id">

                <div class="single-box">

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="d-md-block col-md-4 img-wrapping-restaurant">
                                <div class="img-wrapping-restaurant-list">
                                    <!-- Image -->
                                    <img :src="item.image" class="img-fluid rounded-start" :alt="item.name + ' image'">
                                </div>
                            </div>
                            <div class="col-md-8 wrapping-card-body">
                                <!-- card body -->
                                <div class="card-body">

                                    <!-- modalità per dekstop / tablet -->
                                    <div class="d-none d-sm-none d-md-block">

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

                                    </div>


                                    <!-- router per modalità mobile-->
                                    <router-link id="link-m-mobile-restaurants" class="d-block d-sm-block d-md-none" :to="{name: 'restaurant-menu', params: {slug: item.slug} }">

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

                                    </router-link>
                                </div>

                                <!-- button -->
                                <div class="btn-vai-menu d-none d-sm-none d-md-block">
                                    <!-- Link -->
                                    <router-link class="btn btn-primary" id="btn-smaller-menu"  :to="{name: 'restaurant-menu', params: {slug: item.slug} }">
                                        Vai al menù
                                    </router-link>
                                </div>
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
        },
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
            position: relative;
            width: 100%;
            height: 100%;

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
    }
}
// wrapping section
#wrapping-restaurant-list{
    position: fixed;
    top: 10vh;
    left: 50%;
    transform: translate(-50%);
    background-color: white;
    border-radius: 10px;
    z-index: 100;
    box-shadow: 17px 0px 40px 6px #2E3333;
    padding: 10px 5px;
    width: 50%;
    max-height: 80vh; 
    overflow-y: scroll;
    overflow-x: hidden;
}
#link-m-mobile-restaurants{
    color: black;
}

// media query
@media screen and (max-width: 1360px) {
  #wrapping-restaurant-list {
    width: 70%;
    overflow-y: scroll;
  }
}
@media screen and (max-width: 900px) {
  #wrapping-restaurant-list {
    width: 80%;
    overflow-y: scroll;
  }
}
@media screen and (max-width: 800px) {
    .img-wrapping-restaurant{
        display: none;
    }
    #wrapping-restaurant-list {
        width: 90%;
        overflow-y: scroll;
    }
    // buttons
    .btn-vai-menu{
        margin: 0px;

        #btn-smaller-menu{
            padding: 5px 10px;
        }
    }
}

// img wrapping
.img-wrapping-restaurant-list{
    width: 100%;
    height: 100% !important;

    img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
}

.wrapping-card-body{
    display: flex;
    align-items: center;
}
// buttons
.btn-vai-menu{
    margin-right: 10%;

    .btn{
        padding: 10px 20px;
        background-color: $secondary_color;
        border: 0px;
        &:hover{
            background-color: $primary-color;
            transform: scale(1.1);
        }
    }
}





</style>