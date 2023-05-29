<template>
    <MainLayout :current-page="currentPage">
        <h1>Project Page</h1>
        <div>Название: {{ projectData[0].Name }}</div>
        <div>Автор: {{ projectData[0].Author }}</div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Project",
    components: {
        MainLayout,
    },
    props: {
        currentPage: String,
        projectData: Object,
    },
};
</script>
