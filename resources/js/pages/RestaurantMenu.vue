<template>
  <div>
      <h1>ciao sono il menu</h1>
  </div>
</template>

<script>
export default {
    name: 'RestaurantMenu',
    data: function() {
        return {
            menu: {}
        }
    },
    methods: {
        getMenu: function() {
            axios.get('/api/restaurant/' + this.$route.params.slug)
            .then((response) => {
                this.menu = response.data.results.foods;
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