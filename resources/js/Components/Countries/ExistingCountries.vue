<template class="existingCountries">
    <h2 class="existingCountries__title">
        Заметили ошибку? Нажмите на ячейку и исправьте!
    </h2>
    <table class="existingCountries__table">
        <thead>
            <tr>
                <th class="existingCountries__nameOfColumn">Название</th>
            </tr>
        </thead>
        <tbody>
            <CountriesTableRow
                v-for="country in countries"
                :key="country.id"
                :country="country"
            />
        </tbody>
    </table>
</template>

<script>
import CountriesTableRow from "./CountriesTableRow.vue";

export default {
    name: "ExistingCountries",
    components: {
        CountriesTableRow,
    },
    props: {
        countries: Array,
    },
};
</script>

<style scoped lang="scss">
.existingCountries {
    &__title {
        text-align: center;
    }

    &__table {
        border-collapse: collapse;
        margin-top: 30px;
        width: 30%;
        margin-left: 50px;
    }

    &__nameOfColumn {
        padding: 3px;
        border: 1px solid black;
    }
}
</style>
