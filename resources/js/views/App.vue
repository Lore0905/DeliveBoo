<template>

    <div>
        <Header />

        <main>
            <router-view @amount="receiveAmount" :totalAmount="totalAmount"></router-view>
        </main>
    </div>
</template>



<script>
import Header from '../components/Header.vue';
export default {
    name: 'App',
    data: function() {
        return {
            totalAmount: ''
        }
    },
    components: {
        Header
    },
    methods: {
        receiveAmount(totalAmount) {
            this.totalAmount = totalAmount;
        }
    }
}
</script>

<style lang="scss" >
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';
</style>