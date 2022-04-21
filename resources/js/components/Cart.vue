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
                        <button  class="btn btn-danger mx-2 float-right" @click="trash(food)">
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

        <!--MODEL  -->
        <div v-if="showModal">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ATTENZIONE ! </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="showModal = false">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>sei sicuro di eliminare il piatto ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="deleteFood()">ELIMINA</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </transition>
        </div>
        <!-- END MODEL -->

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
                showModal: false,
                selectedFood: {}
            }
        },
        props:{
            selectedElement: Array,
        },
        methods: {
            trash: function(food){

                this.showModal = true;

                console.log(food)

                this.selectedFood = food;

            },
            deleteFood: function(){

                let food = this.selectedFood

                this.selectedElement.splice(this.selectedElement.indexOf(food), 1);

                food.quantity = 0;

                this.showModal = false;

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

// MODEL
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0px;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: top;
}

.modal-footer{
    padding: 20px 0px;
}

// trash
.fa-trash-can{
    width: 50px;
    height: 50px;
    color: white;
}

</style>

