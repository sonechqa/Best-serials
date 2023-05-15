<template>
    <h2>Заметили ошибку? Нажмите на ячейку и исправьте!</h2>
    <table>
        <thead>
            <tr>
                <th>Название</th>
            </tr>
        </thead>
        <tbody>
            <CountriesTableRow
                v-for="country in countries"
                :key="country.id"
                :country="country"
            ></CountriesTableRow>
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

<style>
h2 {
    text-align: center;
}

table {
    border-collapse: collapse;
    margin-top: 30px;
    width: 30%;
    margin-left: 50px;
}

th {
    padding: 3px;
    border: 1px solid black;
}
</style>
