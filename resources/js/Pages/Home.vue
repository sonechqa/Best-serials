<template>
    <MainLayout>
        <div>Name: {{ user.name }}</div>
        <div>Email: {{ user.email }}</div>
        <AllSerials
            :serials="serials"
            :genres="genres"
            :countries="countries"
            :selectedGenres="selectedGenres"
            :selectedCountries="selectedCountries"
        />
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import AllSerials from "../Components/Serials/AllSerials.vue";
import axios from "axios";

export default {
    name: "Home",
    components: {
        MainLayout,
        AllSerials,
    },
    props: {
        serials: Array,
        genres: Array,
        countries: Array,
        selectedGenres: Array,
        selectedCountries: Array,
    },
    data() {
        return {
            user: {},
        };
    },
    mounted() {
        axios.get("/api/user").then((res) => {
            this.user = res.data;
        });
    },
};
</script>
