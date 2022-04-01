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

.restaurant-list{
    color: $secondary_color;

    .restaurants-title{
        font-size: $components_title;
        font-weight: 600;
        font-style: italic;
        color: $secondary_color;
    }

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