<template>
    <MainLayout></MainLayout>
    <SerialsOnMain :serials="serials"></SerialsOnMain>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import SerialsOnMain from "../Components/SerialsOnMain.vue";

export default {
    name: "Home",
    components: {
        MainLayout,
        SerialsOnMain,
    },
    props: {
        serials: Array,
    },
};
</script>
