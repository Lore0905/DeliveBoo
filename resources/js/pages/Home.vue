<template>
    <div>
        <Searchbox/>
        <!-- <News /> -->
        <Selection />
        <Work />
    </div>
</template>

<script>
// import News from '../components/News.vue';
import Selection from '../components/Selection.vue';
import Work from '../components/Work.vue';
import Searchbox from '../components/Searchbox.vue';

export default {
    name: 'Home',
    data:function(){
        return{
            restaurants: [],
        }
    },
    components: {
        Searchbox,
        // News,
        Selection,
        Work
    },
    methods: {
        getRestaurants: function(){
            axios.get('/api/restaurants')
            .then((response) => {
                this.restaurants = response.data.restaurants;
            });
        }
    },
    created: function(){
        this.getRestaurants();
    }
}
</script>