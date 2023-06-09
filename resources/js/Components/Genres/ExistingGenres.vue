<template class="existingGenres">
    <h2 class="existingGenres__title">
        Заметили ошибку? Нажмите на ячейку и исправьте!
    </h2>
    <table class="existingGenres__table">
        <thead>
            <tr>
                <th class="existingGenres__nameOfColumn">Название</th>
            </tr>
        </thead>
        <tbody>
            <GenresTableRow
                v-for="genre in genres"
                :key="genre.id"
                :genre="genre"
            />
        </tbody>
    </table>
</template>

<script>
import GenresTableRow from "./GenresTableRow.vue";

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

<style scoped lang="scss">
.existingGenres {
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
