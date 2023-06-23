<template class="existingSerials">
    <h2 class="existingSerials__title">
        Заметили ошибку? Нажмите на ячейку и исправьте!
    </h2>
    <h4 class="existingSerials__subtitle">
        Обратите внимание на то, что вы не можете редактировать рейтинг сериала.
        Он выссчитывается автоматически на основе оценок пользователей.
    </h4>
    <table class="existingSerials__table">
        <thead>
            <tr>
                <th class="existingSerials__nameOfColumn">Название</th>
                <th class="existingSerials__nameOfColumn">Постер</th>
                <th class="existingSerials__nameOfColumn">Описание</th>
                <th class="existingSerials__nameOfColumn">Режиссёры</th>
                <th class="existingSerials__nameOfColumn">Рейтинг</th>
                <th class="existingSerials__nameOfColumn">Годы выхода</th>
                <th class="existingSerials__nameOfColumn">Жанры</th>
                <th class="existingSerials__nameOfColumn">Страны</th>
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

<style scoped lang="scss">
.existingSerials {
    &__title,
    &__subtitle {
        text-align: center;
    }

    &__table {
        border-collapse: collapse;
        margin-top: 30px;
        width: 90%;
        margin-left: 40px;
        margin-bottom: 50px;
    }

    &__nameOfColumn {
        padding: 3px;
        border: 1px solid black;
    }
}
</style>
