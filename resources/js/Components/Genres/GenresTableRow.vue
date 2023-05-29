<template>
    <tr>
        <td>
            <input type="text" v-model="Name" />
        </td>
        <div class="buttons">
            <button type="button" class="saveGenre" @click="saveGenre">
                Сохранить
            </button>
            <button type="button" class="deleteGenre" @click="deleteGenre">
                Удалить жанр
            </button>
        </div>
    </tr>
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    name: "GenresTableRow",
    props: {
        genre: Object,
    },
    data() {
        return {
            Name: this.genre.Name,
        };
    },
    methods: {
        saveGenre() {
            router.post("/updateGenre", {
                id: this.genre.id,
                Name: this.Name,
            });
        },
        deleteGenre() {
            router.post("/deleteGenre", {
                id: this.genre.id,
            });
        },
    },
};
</script>

<style scoped>
tr {
    position: relative;
}

td {
    padding: 3px;
    border: 1px solid black;
    text-align: center;
    height: 40px;
}

input {
    outline: none;
}

.buttons {
    display: flex;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.saveGenre {
    margin-left: 10px;
    background-color: rgb(83, 184, 221);
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.deleteGenre {
    margin-left: 10px;
    padding: 0px 15px;
    background-color: rgb(58, 198, 62);
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
