<template>
    <MainLayout>
        <AllSerials
            :serials="serials"
            :genres="genres"
            :countries="countries"
            :selectedGenres="selectedGenres"
            :selectedCountries="selectedCountries"
        ></AllSerials>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import AllSerials from "../Components/AllSerials.vue";

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
};
</script>
