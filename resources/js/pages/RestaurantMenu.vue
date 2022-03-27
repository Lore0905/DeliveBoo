<template>
  <div>
      <h1>{{ restaurant.name }}</h1>
      <div v-for="food in menu" :key="food.id">
          {{food.name}}
      </div>
  </div>
</template>

<script>
export default {
    name: 'RestaurantMenu',
    data: function() {
        return {
            menu: {},
            restaurant: '',
        }
    },
    methods: {
        getMenu: function() {

            axios.get('/api/restaurant/' + this.$route.params.slug)
            .then((response) => {
                this.menu = response.data.results.foods;
                this.restaurant = response.data.results;
                // console.log(this.menu);
            });

        }
    },
    created: function() {
        this.getMenu();
    }
}
</script>

<style>

</style>