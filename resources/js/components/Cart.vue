<template>
    <div id="page-cart-container">
        <i id="cart-icon" @click="showCart = !showCart" :class=" showCart === false ? '' : 'd-none' " class="fas fa-shopping-cart">  <span>{{ selectedElement.length === 0 ? '' : selectedElement.length }}</span>  </i>
        
        <div :class=" showCart === false ? 'd-none' : '' " class="cart-item card">
            <div class="card-body">
                <i @click="showCart = !showCart" id="cart-close-icon" class="fas fa-angle-double-right"></i>
                <h5 class="card-title">Carrello</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li v-if="selectedElement.length === 0" class="list-group-item">
                    <small class="text-muted">Il tuo carrello è vuoto.</small>
                </li>
                <li v-for="food in selectedElement" :key="food.id" class="list-group-item">
                    <div>
                        <span>{{ food.name }}</span>
                        <button @click="deleteElement(food)" class="btn btn-danger mx-2 float-right">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div>
                        <small class="text-muted">Q.tà: {{ food.quantity }}</small>
                    </div>
                </li>
            </ul>
            <div class="card-body">
                <div class="wrapping-total-amount">
                    <strong>Totale Ordine</strong>
                    <div class="total-amount">{{ totalAmount.toFixed(2) }} €</div>
                </div>
            </div>
            <div v-if="selectedElement.length > 0" class="card-body">
                <router-link class="btn btn-secondary" :class="selectedElement.length > 0 ? '' : 'disabled'" :to="{ name: 'order-form' }">
                    Procedi all'ordine
                </router-link>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name:'Cart',
        data: function(){
            return{
                showCart: false,
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

#page-cart-container{
    position: absolute;
    top: 0;
    right: 0;
    #cart-icon{
        color: #00ccbc;
        font-size: 25px;
        padding: 10px;
        background-color: #fff;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        -webkit-box-shadow: 1px 1px 5px 0px #000000; 
        box-shadow: 1px 1px 5px 0px #000000;
        cursor: pointer;

        display: flex;
        flex-flow: row nowrap;
        justify-content: center;
        align-items: center;

        position: fixed;
        right: -3px;
        top: 50%;
        z-index: 9999;
        &:hover{
            color: $secondary-color;
        }
        span{
            padding: 5px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 500;
            font-size: 20px;
        }
    }
    .cart-item{
        position: fixed;
        top: 0;
        right: 0;
        z-index: 9999;

        -webkit-box-shadow: 1px 1px 5px 0px #000000; 
        box-shadow: 1px 1px 5px 0px #000000;

        width: 25%;
        #cart-close-icon{
            float: right;
            font-size: 25px;
            color: #00ccbc;
            cursor: pointer;
            &:hover{
                color: $secondary-color;
            }
        }
    }
}

@media (max-width: 1200px){
    #page-cart-container{
        .cart-item {
            width: 40%;
        }
    }
}

@media (max-width: 575.98px) {
    #page-cart-container{
        .cart-item {
            width: 100%;
        }
    }
}

</style>

