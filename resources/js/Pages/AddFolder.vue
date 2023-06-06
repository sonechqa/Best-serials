<template>
    <MainLayout :user="user">
        <h1>Добавление папки с фильмами</h1>
        <form @submit.prevent="postFolder">
            <div>
                <label for="Name">Название: </label>
                <input type="text" id="Name" v-model="Name" />
            </div>
            <button>Добавить</button>
        </form>
        <ExistingFolders :folders="folders" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import ExistingFolders from "../Components/Folders/ExistingFolders.vue";
import axios from "axios";

export default {
    name: "AddFolder",
    components: {
        MainLayout,
        ExistingFolders,
    },
    props: {
        folders: Array,
        user: Object,
    },
    data() {
        return {
            Name: "",
        };
    },
    methods: {
        postFolder() {
            axios.post("/addFolder", {
                Name: this.Name,
            });
        },
    },
};
</script>

<style scoped lang="scss">
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
