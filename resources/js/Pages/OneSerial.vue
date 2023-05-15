<template>
    <MainLayout>
        <SerialDescription :serial="serial" />
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
        serial: Array,
    },
};
</script>

<style scoped></style>
