<template>

    <div class="wrapping-content">

        <head>
            <link rel="icon" type="image/x-icon" href="../../../public/img/logo-senza-scritta.png">
        </head>
        
        <Header />

        <main>
            <router-view 
            @selectedElement="receiveSelectedElement" 
            @amount="receiveAmount" 
            :totalAmount="totalAmount"
            :selectedElement="selectedElement"
            ></router-view>
        </main>

        <!-- <Footer /> -->

    </div>
</template>



<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
    name: 'App',
    data: function() {
        return {
            totalAmount: null,
            selectedElement: '',
        }
    },
    components: {
        Header,
        Footer
    },
    methods: {
        receiveAmount(totalAmount) {
            this.totalAmount = totalAmount;
        },
        receiveSelectedElement(selectedElement){
            this.selectedElement = selectedElement;
        }
    }
}
</script>

<style lang="scss" >
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';
</style>