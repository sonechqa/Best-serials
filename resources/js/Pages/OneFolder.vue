<template>
    <MainLayout :user="user">
        {{ serials }}
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    name: "OneFolder",
    components: {
        MainLayout,
    },
    props: {
        serials: Array,
        folder: Object,
        user: Object,
    },
};
</script>

<style scoped lang="scss"></style>
