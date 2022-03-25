<template>
    <div>
        <Header/>
        <News />
        <Selection />
        <Work />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import News from '../components/News.vue';
import Selection from '../components/Selection.vue';
import Work from '../components/Work.vue';

export default {
    name: 'Home',
    components: {
        Header,
        News,
        Selection,
        Work
    }
}
</script>