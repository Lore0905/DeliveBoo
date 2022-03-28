<template>
    <div>
        <div>
            Carrello:
        </div>
        <div>
            <div class="py-4" v-for="food in selectedElement" :key="food.id">
                <h4>
                    {{food.name}}
                </h4>
                <div>
                    {{food.quantity}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'Cart',
        data: function(){
            return{

            }
        },
        props:{
            selectedElement: Array,
        },
        methods: {

        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

</style>