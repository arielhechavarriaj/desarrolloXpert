<template>
    <div class='container'>
        <a-typography-title>Vue Library App</a-typography-title>
        <router-view></router-view>
    </div>
</template>

<script>
import TestsList from './components/TestsList.vue';
import TestItem from './components/TestItem.vue';

export default {
    components: {
        TestsList,
        TestItem
    }
}
</script>

<style scoped>
.container {
    padding: 2%;
}
</style>
