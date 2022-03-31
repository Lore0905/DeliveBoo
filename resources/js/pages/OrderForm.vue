<template>
    <div class="order-form">

        <div class="container">

            <div v-if="success">Grazie per aver inserito i tuoi dati, 
                <a href="/payment">
                    'mo dacci i soldi
                </a>
            </div>

            <form v-if="success === false" action="" method="post" class="d-flex flex-column">

                <label for="customer_name">Nome</label>
                <input v-model="customer_name" class="" type="text" id="customer_name" name="customer_name">

                <div v-if="errors.customer_name">
                    <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                </div>

                <label for="customer_email">Email</label>
                <input v-model="customer_email" class="" type="email" name="customer_email" id="customer_email">

                <div v-if="errors.customer_email">
                    <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                </div>

                <label for="customer_address">Indirizzo</label>
                <input v-model="customer_address" class="" type="text" name="customer_address" id="customer_address">

                <div v-if="errors.customer_address">
                    <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                </div>

                <label for="customer_phone_number">Numero telefonico</label>
                <input v-model="customer_phone_number" class="" type="text" name="customer_phone_number" id="customer_phone_number">

                <div v-if="errors.customer_phone_number">
                    <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                </div>

                <label for="total_amount">Totale</label>
                <input v-model="totalAmount" class="" disabled type="text" name="total_amount" id="total_amount">

                <!-- <input value="{{totalAmount}}" class="" disabled type="text" name="total_amount" id="total_amount"> -->

                <button class="my-4 btn m_button_form_create" type="submit" @click.prevent="sendOrder()">
                    Invia
                </button>

            </form>

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
        }
    },
    props: {
        totalAmount: Number
    },
    methods:{
        sendOrder: function(){
            axios.post('/api/orders/store',{
                customer_name: this.customer_name,
                customer_email: this.customer_email,
                customer_address: this.customer_address,
                customer_phone_number: this.customer_phone_number,
                total_amount: this.total_amount
            })
            .then((response) =>{
                if (response.data.success) {
                    this.customer_name = '',
                    this.customer_email = '',
                    this.customer_address = '',
                    this.customer_phone_number = '',
                    this.success = true,
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
.order-form{
    margin: 30px 0;   

    form{

        label{
            margin-bottom: 10px;
            font-size: 20px;
        }

        input{
            margin-bottom: 20px;
        }
    }
}
</style>