<template class="allSerials">
    <div class="allSerials__container container">
        <div class="allSerials__filters">
            <slot />
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
            <button
                type="button"
                class="allSerials__button"
                @click="showSerials"
            >
                Показать
            </button>
        </div>
        <div class="allSerials__listOfSerials" v-if="serials.length > 0">
            <SerialsOnMain
                :serials="serials"
                :genres="genres"
                :countries="countries"
            />
        </div>
        <div class="allSerials__noMatches" v-else>
            <h3 class="allSerials__subtitle">
                Простите, совпадения не найдены.<br />Попробуйте изменить
                запрос.
            </h3>
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
        pagePath: String,
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
                this.pagePath,
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

<style scoped lang="scss">
.allSerials {
    &__container {
        display: flex;
        background-color: rgb(239, 231, 231);
        padding-bottom: 40px;
    }

    &__filters {
        padding-left: 30px;
        padding-top: 40px;
    }

    &__button {
        width: min-content;
        height: min-content;
        border-radius: 5px;
        background-color: rgb(126, 202, 72);
        padding: 5px;
    }

    &__listOfSerials {
        width: 100%;
    }

    &__noMatches {
        margin: auto;
        text-align: center;
    }

    &__subtitle {
        font-weight: 400;
    }
}
</style>
