<template>
    <MainLayout :user="user" :folders="folders">
        <AllSerials
            :serials="serials"
            :genres="genres"
            :countries="countries"
            :selectedGenres="selectedGenres"
            :selectedCountries="selectedCountries"
            pagePath="/"
        />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import AllSerials from "../Components/Serials/AllSerials.vue";

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
        user: Object,
        folders: Array,
    },
};
</script>
