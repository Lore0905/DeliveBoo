<template>
    <div>
        <Header/>
        <Serchbox/>
        <!-- <News /> -->
        <Selection />
        <Work />
    </div>
</template>



<script>
import Header from '../components/Header.vue';
import News from '../components/News.vue';
import Selection from '../components/Selection.vue';
import Work from '../components/Work.vue';
import Serchbox from '../components/Serchbox.vue';

export default {
    name: 'App',
    components: {
        Header,
        Serchbox,
        News,
        Selection,
        Work,
    }
}
</script>

<style lang="scss" >
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';
</style>