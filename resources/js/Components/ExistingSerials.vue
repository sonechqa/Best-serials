<template>
    <h1>Заметили ошибку? Нажмите на ячейку и исправьте!</h1>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Режиссёры</th>
                <th>Рейтинг</th>
                <th>Годы выхода</th>
                <th>Жанры</th>
                <th>Страны</th>
            </tr>
        </thead>
        <tbody>
            <TableRow
                v-for="serial in serials"
                :key="serial.id"
                :serial="serial"
            ></TableRow>
        </tbody>
    </table>
</template>

<script>
import TableRow from "./TableRow.vue";

export default {
    components: {
        TableRow,
    },
    props: {
        serials: Array,
    },
};
</script>

<style>
table {
    border-collapse: collapse;
    margin-top: 30px;
    width: 90%;
    margin-left: 40px;
}

td,
th {
    padding: 3px;
    border: 1px solid black;
}
</style>
