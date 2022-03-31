<template>

    <div>
        <Header />

        <main>
            <router-view 
            @selectedElement="receiveSelectedElement" 
            @amount="receiveAmount" 
            :totalAmount="totalAmount"
            :selectedElement="selectedElement"
            ></router-view>
        </main>
    </div>
</template>



<script>
import Header from '../components/Header.vue';
export default {
    name: 'App',
    data: function() {
        return {
            totalAmount: null,
            selectedElement: '',
        }
    },
    components: {
        Header
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