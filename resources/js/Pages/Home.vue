<template>
    <MainLayout>
        <SerialsOnMain :serials="serials" :genres="genres"></SerialsOnMain>
    </MainLayout>
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
        genres: Array,
    },
};
</script>
