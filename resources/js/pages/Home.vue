<template>
    <div>
        <!-- searchbox -->
        <Searchbox @blurBody="blurPage"/>
        <!-- selection -->
        <div :class=" this.blur === true ? 'wrapping-body-blur' : '' ">
            <Selection />
        <!-- work -->
            <Work />
        <!-- footer -->
            <Footer/>
        </div>        
    </div>
</template>

<script>
import Selection from '../components/Selection.vue';
import Work from '../components/Work.vue';
import Searchbox from '../components/Searchbox.vue';
import Footer from '../components/Footer.vue';

export default {
    name: 'Home',
    data:function(){
        return{
            restaurants: [],
            blur: false,
            showModal: false
        }
    },
    components: {
        Searchbox,
        // News,
        Selection,
        Work,
        Footer,
    },
    methods: {
        getRestaurants: function(){
            axios.get('/api/restaurants')
            .then((response) => {
                this.restaurants = response.data.restaurants;
            });
        },
        blurPage(restaurantSelectedCompleted){
            this.blur = restaurantSelectedCompleted
        }
    },
    created: function(){
        this.getRestaurants();
    }
}
</script>
