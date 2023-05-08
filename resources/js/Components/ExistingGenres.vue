<template>
    <h2>Заметили ошибку? Нажмите на ячейку и исправьте!</h2>
    <table>
        <thead>
            <tr>
                <th>Название</th>
            </tr>
        </thead>
        <tbody>
            <GenresTableRow
                v-for="genre in genres"
                :key="genre.id"
                :genre="genre"
            ></GenresTableRow>
        </tbody>
    </table>
</template>

<script>
import GenresTableRow from "../Components/GenresTableRow.vue";

export default {
    name: "ExistingGenres",
    components: {
        GenresTableRow,
    },
    props: {
        genres: Array,
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
