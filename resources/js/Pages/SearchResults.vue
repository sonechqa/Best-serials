<template>
    <MainLayout>
        <div class="container">
            <h1>Результаты поиска</h1>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    name: "SearchResults",
    components: {
        MainLayout,
    },
};
</script>

<style scoped>
.container {
    width: 1000px;
}
</style>
