<template>

    <div>
        <Header />

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>



<script>
import Header from '../components/Header.vue';
export default {
    name: 'App',
    components: {
        Header
    }
}
</script>

<style lang="scss" >
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';
</style>