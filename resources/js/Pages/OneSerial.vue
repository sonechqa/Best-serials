<template>
    <MainLayout :user="user" :folders="folders">
        <SerialDescription
            :serial="serial"
            :folders="folders"
            :avgRating="avgRating"
            :userRating="userRating"
        />
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
        avgRating: Number,
        userRating: Number,
    },
};
</script>
