<template>
    <tr class="genresTableRow">
        <td class="genresTableRow__td">
            <input type="text" v-model="Name" />
        </td>
        <div class="genresTableRow__buttons">
            <button
                type="button"
                class="genresTableRow__saveGenre"
                @click="saveGenre"
            >
                Сохранить
            </button>
            <button
                type="button"
                class="genresTableRow__deleteGenre"
                @click="deleteGenre"
            >
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

<style scoped lang="scss">
.genresTableRow {
    position: relative;

    &__td {
        padding: 3px;
        border: 1px solid black;
        text-align: center;
        height: 40px;
    }

    &__buttons {
        display: flex;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    &__saveGenre {
        margin-left: 10px;
        background-color: rgb(83, 184, 221);
        border-radius: 5px;

        @media screen and (max-width: 360px) {
            padding: 0px;
        }

        @media screen and (max-width: 330px) {
            margin-left: 5px;
        }
    }

    &__deleteGenre {
        margin-left: 10px;
        padding: 0px 15px;
        background-color: rgb(58, 198, 62);
        border-radius: 5px;

        @media screen and (max-width: 365px) {
            padding: 0px 5px;
        }

        @media screen and (max-width: 330px) {
            margin-left: 5px;
        }
    }
}
</style>
