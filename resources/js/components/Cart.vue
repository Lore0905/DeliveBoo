<template>
    <div>
        <div>
            <span class="font-weight-bold">Carrello:</span>
        </div>
        <div>
            <div class="py-4 cart-item" v-for="food in selectedElement" :key="food.id">
                <h4>
                    {{food.name}}
                </h4>
                <span>
                    {{food.quantity}}
                </span>
                <button @click="deleteElement(food)" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div v-if="selectedElement.length > 0">
                <router-link class="btn m_button link-to" :to="{ name: 'checkout' }">
                    Procedi all'ordine
                </router-link>
                <!-- <button class="btn m_button">
                    Procedi all'ordine
                </button> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'Cart',
        data: function(){
            return{
                foods : this.selectedElement,
            }
        },
        props:{
            selectedElement: Array,
        },
        methods: {
            deleteElement: function(element){
                this.selectedElement.splice(this.selectedElement.indexOf(element), 1);

                element.quantity = 0;
            }
        },
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

</style>