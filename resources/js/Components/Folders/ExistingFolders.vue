<template class="existingFolders">
    <h2 class="existingFolders__title">
        Заметили ошибку? Нажмите на ячейку и исправьте!
    </h2>
    <table class="existingFolders__table">
        <thead>
            <tr>
                <th class="existingFolders__nameOfColumn">Название</th>
            </tr>
        </thead>
        <tbody>
            <FoldersTableRow
                v-for="folder in folders"
                :key="folder.id"
                :folder="folder"
            />
        </tbody>
    </table>
</template>

<script>
import FoldersTableRow from "./FoldersTableRow.vue";

export default {
    name: "ExistingFolders",
    components: {
        FoldersTableRow,
    },
    props: {
        folders: Array,
    },
};
</script>

<style scoped lang="scss">
.existingFolders {
    &__title {
        text-align: center;

        @media screen and (max-width: 375px) {
            padding-left: 15px;
            padding-right: 15px;
        }
    }

    &__table {
        border-collapse: collapse;
        margin-top: 30px;
        width: 30%;
        margin-left: 50px;
        margin-bottom: 50px;

        @media screen and (max-width: 420px) {
            margin-left: 35px;
        }

        @media screen and (max-width: 400px) {
            margin-left: 20px;
        }

        @media screen and (max-width: 370px) {
            margin-left: 10px;
        }
    }

    &__nameOfColumn {
        padding: 3px;
        border: 1px solid black;
    }
}
</style>
