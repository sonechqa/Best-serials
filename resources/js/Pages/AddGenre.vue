<template>
    <MainLayout :user="user">
        <h1>Добавление жанра в список</h1>
        <form @submit.prevent="postGenre">
            <div>
                <label for="Name">Название: </label>
                <input type="text" id="Name" v-model="Name" />
            </div>
            <button>Добавить</button>
        </form>
        <ExistingGenres :genres="genres"></ExistingGenres>
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

<style scoped>
h1 {
    text-align: center;
}

form {
    margin-left: 50px;
}

div {
    margin-bottom: 20px;
}

input {
    outline: none;
}

button {
    cursor: pointer;
}
</style>
