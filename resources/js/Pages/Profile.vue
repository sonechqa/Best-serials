<template>
    <MainLayout :current-page="currentPage">
        <h1>Profile Page</h1>
        <div>Name: {{ user.name }}</div>
        <div>Email: {{ user.email }}</div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    currentPage: String,
    user: Object,
});
</script>
