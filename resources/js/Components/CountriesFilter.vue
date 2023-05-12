<template>
    <div class="form">
        <p class="title">Страны:</p>
        <div class="country" v-for="country in countries" :key="country.id">
            <input
                type="checkbox"
                :id="'countries' + country.id"
                :value="country.id"
                v-model="checkedCountries"
            />
            <label :for="'countries' + country.id">{{ country.Name }}</label>
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

<style scoped>
.form {
    display: flex;
    flex-direction: column;
}

.title {
    font-weight: 700;
    margin-top: 0;
}

.country {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}

input {
    cursor: pointer;
    margin-right: 5px;
}

label {
    cursor: pointer;
}
</style>
