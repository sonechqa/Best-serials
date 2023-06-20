<template>
    <div class="countriesFilter">
        <p class="countriesFilter__title">Страны:</p>
        <div
            class="countriesFilter__country"
            v-for="country in countries"
            :key="country.id"
        >
            <input
                type="checkbox"
                :id="'countries' + country.id"
                :value="country.id"
                v-model="checkedCountries"
                class="countriesFilter__checkbox"
            />
            <label
                :for="'countries' + country.id"
                class="countriesFilter__name"
                >{{ country.Name }}</label
            >
        </div>
    </div>
</template>

<script>
export default {
    name: "CountriesFilter",
    props: {
        countries: Array,
        selectedCountries: Array,
    },
    data() {
        return {
            checkedCountries: this.selectedCountries || [],
        };
    },
    watch: {
        checkedCountries(newCountries) {
            this.$emit("update:modelValue", newCountries);
        },
    },
    emits: ["update:modelValue"],
};
</script>

<style scoped lang="scss">
.countriesFilter {
    display: flex;
    flex-direction: column;
    max-width: 230px;

    &__title {
        font-weight: 700;
        margin-top: 0;
    }

    &__country {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    &__checkbox {
        cursor: pointer;
        margin-right: 5px;
    }

    &__name {
        cursor: pointer;
    }
}
</style>
