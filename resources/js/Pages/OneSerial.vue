<template>
    <MainLayout :user="user" :folders="folders">
        <SerialDescription :serial="serial" :folders="folders" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import SerialDescription from "../Components/Serials/SerialDescription.vue";

export default {
    name: "OneSerials",
    components: {
        MainLayout,
        SerialDescription,
    },
    props: {
        serial: Object,
        user: Object,
        folders: Array,
    },
};
</script>
