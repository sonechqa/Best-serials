<template>
    <div class="container">
        <div class="filters">
            <GenresFilter
                :genres="genres"
                :selectedGenres="selectedGenres"
                @update:modelValue="checkedGenres = $event"
            />
            <CountriesFilter
                :countries="countries"
                :selectedCountries="selectedCountries"
                @update:modelValue="checkedCountries = $event"
            />
            <button type="button" @click="showSerials">Показать</button>
        </div>
        <div class="wrapper">
            <SerialsOnMain
                :serials="serials"
                :genres="genres"
                :countries="countries"
            />
        </div>
    </div>
</template>

<script>
import GenresFilter from "../Genres/GenresFilter.vue";
import CountriesFilter from "../Countries/CountriesFilter.vue";
import SerialsOnMain from "./SerialsOnMain.vue";
import { router } from "@inertiajs/vue3";

export default {
    name: "AllSerials",
    components: {
        GenresFilter,
        CountriesFilter,
        SerialsOnMain,
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
            checkedGenres: this.selectedGenres,
            checkedCountries: this.selectedCountries,
        };
    },
    methods: {
        showSerials() {
            router.get(
                "/",
                {
                    checkedGenres: this.checkedGenres,
                    checkedCountries: this.checkedCountries,
                },
                { replace: true }
            );
        },
    },
};
</script>

<style scoped>
.container {
    width: 1000px;
    display: flex;
    margin: auto;
    margin-top: 50px;
    border: 1px solid black;
    box-shadow: 0px 0px 25px 13px rgb(50, 49, 49);
    background-color: rgb(239, 231, 231);
}

.filters {
    padding-left: 30px;
    padding-top: 40px;
}

button {
    width: min-content;
    height: min-content;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: rgb(126, 202, 72);
    padding: 5px;
}
</style>
