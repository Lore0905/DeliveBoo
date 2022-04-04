<template>
    <div class="order-form">

        <div class="container">

            <div v-if="success">Grazie per aver inserito i tuoi dati, 
                <a class="btn m_button" :href="'/payment/' + order">
                    Procedi al pagamento
                </a>
            </div>

            <div class="wrapping-order-form" v-if="success === false">
                <div class="row row-cols-1 row-cols-lg-2">

                    <div class="col">
                        <div class="wrapping-img">
                            <img src="../../../public/img/logo-senza-scritta.png" alt="logo deliveroo">
                        </div>

                        <h3>
                            A casa o in ufficio, in 32 minuti!
                        </h3>
                    </div>

                    <div class="col">
                        <form  action="" method="post" class="d-flex flex-column">

                            <label for="customer_name">Nome</label>
                            <input v-model="customer_name" class="" type="text" id="customer_name" name="customer_name">

                            <div v-if="errors.customer_name">
                                <p v-for="(error, index) in errors.customer_name" :key="index">{{ error }}</p>
                            </div>

                            <label for="customer_email">Email</label>
                            <input v-model="customer_email" class="" type="email" name="customer_email" id="customer_email">

                            <div v-if="errors.customer_email">
                                <p v-for="(error, index) in errors.customer_email" :key="index">{{ error }}</p>
                            </div>

                            <label for="customer_address">Indirizzo</label>
                            <input v-model="customer_address" class="" type="text" name="customer_address" id="customer_address">

                            <div v-if="errors.customer_address">
                                <p v-for="(error, index) in errors.customer_address" :key="index">{{ error }}</p>
                            </div>

                            <label for="customer_phone_number">Numero telefonico</label>
                            <input v-model="customer_phone_number" class="" type="text" name="customer_phone_number" id="customer_phone_number">

                            <div v-if="errors.customer_phone_number">
                                <p v-for="(error, index) in errors.customer_phone_number" :key="index">{{ error }}</p>
                            </div>

                            <label for="total_amount"><strong>Totale</strong></label>
                            <input v-model="totalAmount" class="" disabled type="text" name="total_amount" id="total_amount">

                            <!-- <input value="{{totalAmount}}" class="" disabled type="text" name="total_amount" id="total_amount"> -->

                            <button class="my-4 btn m_button_form_create" type="submit" @click.prevent="sendOrder()">
                                Invia
                            </button>

                        </form>
                    </div>
                    
                </div>
            </div>
            

        </div>

    </div>
</template>

<script>
export default {
    name: 'OrderForm',
    data: function(){
        return{
            customer_name: '',
            customer_email: '',
            customer_address: '',
            customer_phone_number: '',
            success: false,
            errors: {},
            order: null,
            test: '',
        }
    },
    props: {
        totalAmount: Number,
        selectedElement: Array
    },
    methods:{
        sendOrder: function(){
            axios.post('/api/orders/store',{
                customer_name: this.customer_name,
                customer_email: this.customer_email,
                customer_address: this.customer_address,
                customer_phone_number: this.customer_phone_number,
                total_amount: this.totalAmount,
                selected_element: this.selectedElement,
            })
            .then((response) =>{
                console.log(response);
                if (response.data.success) {
                    this.customer_name = '',
                    this.customer_email = '',
                    this.customer_address = '',
                    this.customer_phone_number = '',
                    this.success = true,
                    this.order = response.data.order,
                    this.errors = {}
                } else {
                    this.success = false,
                    this.errors = response.data.errors
                }
            });
        }
    }

}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
.order-form{
    margin: 30px 0;   

    .wrapping-order-form{
        
        .row{
            display: flex;
            .col{
                flex-grow: 1;
                h3{
                    box-shadow: 7px 7px 5px #dedede;
                    color: $secondary_color;
                    text-align: center;
                    width: 80%;
                    margin: 20% auto;
                    padding: 10px ;
                    border-radius: 10px;
                }
                .wrapping-img{
                    margin: auto;
                    width: 30%;
                }

                form{

                    label{
                        margin-bottom: 10px;
                        font-size: 20px;
                    }

                    input{
                        margin-bottom: 20px;
                        padding: 10px;
                        border-radius: 10px;
                        border: 0px;
                        background-color: rgba($color: $secondary_color, $alpha: 0.1);
                    }
                    #total_amount{
                        background-color: white;
                    }
                }
            }
        }
    }
}
@media (min-width: 992px) { 
    .order-form{
        width: 100%;
        height: calc(100vh - 150px);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
}

</style>