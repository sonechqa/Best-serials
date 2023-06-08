<template>
    <h2>Заметили ошибку? Нажмите на ячейку и исправьте!</h2>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Постер</th>
                <th>Описание</th>
                <th>Режиссёры</th>
                <th>Рейтинг</th>
                <th>Годы выхода</th>
                <th>Жанры</th>
                <th>Страны</th>
            </tr>
        </thead>
        <tbody>
            <SerialsTableRow
                v-for="serial in serials"
                :key="serial.id"
                :serial="serial"
            />
        </tbody>
    </table>
</template>

<script>
import SerialsTableRow from "./SerialsTableRow.vue";

export default {
    name: "ExistingSerials",
    components: {
        SerialsTableRow,
    },
    props: {
        serials: Array,
    },
};
</script>

<style scoped>
h2 {
    text-align: center;
}

table {
    border-collapse: collapse;
    margin-top: 30px;
    width: 90%;
    margin-left: 40px;
}

th {
    padding: 3px;
    border: 1px solid black;
}
</style>
