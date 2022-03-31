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
                <router-link class="btn m_button link-to" :to="{ name: 'order-form' }">
                    Procedi all'ordine
                </router-link>
                <!-- test  -->
                <!-- <button @click="$emit('amount', totalAmount)">prova</button> -->
            </div>
            <div>
                <span>{{ totalAmount }}</span>
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
                totalAmount: 0,
            }
        },
        props:{
            selectedElement: Array,
        },
        methods: {
            deleteElement: function(element){
                this.selectedElement.splice(this.selectedElement.indexOf(element), 1);

                element.quantity = 0;
            },
            updateCartAmount: function(){
                this.totalAmount = 0;

                this.selectedElement.forEach(element => {
                    this.totalAmount = this.totalAmount + (element.price * element.quantity);
                });

            }
        },
        watch: {
            selectedElement: {
                handler() {
                    this.updateCartAmount();
                    // emit to restaurantMenu 
                    this.$emit('amount', this.totalAmount);
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

</style>