<template class="addGenre">
    <MainLayout :user="user" :folders="folders">
        <h1 class="addGenre__title">Добавление жанра в список</h1>
        <form @submit.prevent="postGenre" class="addGenre__form">
            <div class="addGenre__wrapper">
                <label for="Name">Название: </label>
                <input
                    type="text"
                    id="Name"
                    v-model="Name"
                    class="addGenre__field"
                />
            </div>
            <button class="addGenre__button">Добавить</button>
        </form>
        <ExistingGenres :genres="genres" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import axios from "axios";
import ExistingGenres from "../Components/Genres/ExistingGenres.vue";

export default {
    name: "AddGenre",
    components: {
        MainLayout,
        ExistingGenres,
    },
    props: {
        genres: Array,
        user: Object,
        folders: Array,
    },
    data() {
        return {
            Name: "",
        };
    },
    methods: {
        postGenre() {
            axios.post("/addGenre", {
                Name: this.Name,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.addGenre {
    &__title {
        text-align: center;
    }

    &__form {
        margin-left: 50px;
    }

    &__wrapper {
        margin-bottom: 20px;
    }

    &__field {
        outline: none;
    }

    &__button {
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: rgb(225, 125, 53);
        padding: 8px;
    }
}
</style>
