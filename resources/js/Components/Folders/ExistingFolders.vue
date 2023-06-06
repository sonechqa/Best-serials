<template>
    <h2>Заметили ошибку? Нажмите на ячейку и исправьте!</h2>
    <table>
        <thead>
            <tr>
                <th>Название</th>
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
