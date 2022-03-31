<template>
    <div class="wrapping-cart">
        <div class="text-cart">
            CARRELLO
        </div>
        <div class="data-cart">
            <div class="py-4 cart-item" v-for="food in selectedElement" :key="food.id">
                <h4>
                    {{food.name}}
                </h4>
                <span>
                    {{food.quantity}}
                </span>
                <button @click="deleteElement(food)" class="btn btn-danger mx-4">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div v-if="selectedElement.length > 0">
                <router-link class="btn m_button link-to" :to="{ name: 'order-form' }">
                    Procedi all'ordine
                </router-link>  
            </div>
    
            <!-- totale ordine -->
            <div class="wrapping-total-amount">
                <strong>Totale Ordine</strong>
                <div class="total-amount">{{ totalAmount.toFixed(2) }}</div>

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
            deleteElement: function(food){
                this.selectedElement.splice(this.selectedElement.indexOf(food), 1);

                food.quantity = 0;

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

// cart text
.text-cart{
    font-size: 20px;
    background-color: $primary_color;
    border: 1px solid rgba($color: #000000, $alpha: 0.1);
    border-radius: 5px;
    padding: 7px 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

// total amount
.data-cart{
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;

    .wrapping-total-amount{
    border: 1px solid rgba($color: #000000, $alpha: 0.3);
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    font-size: 20px;
    

        .total-amount{
        font-size: 17px;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: $primary_color;
        display: inline-block;
        margin-left: 10px;
        font-size: 25px;
        }
    }
}

// wrapping cart

.wrapping-cart{
    padding-left: 10%;
    width: 100%;
    height: 100%;
}

</style>

