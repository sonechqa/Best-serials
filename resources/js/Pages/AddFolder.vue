<template class="addFolder">
    <MainLayout :user="user" :folders="folders">
        <h1 class="addFolder__title">Добавление папки с фильмами</h1>
        <form @submit.prevent="postFolder" class="addFolder__form">
            <div class="addFolder__wrapper">
                <label for="Name">Название: </label>
                <input
                    type="text"
                    id="Name"
                    v-model="Name"
                    class="addFolder__field"
                />
            </div>
            <button class="addFolder__button">Добавить</button>
        </form>
        <ExistingFolders :folders="folders" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import ExistingFolders from "../Components/Folders/ExistingFolders.vue";
import { router } from "@inertiajs/vue3";

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
            router.post("/addFolder", {
                Name: this.Name,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.addFolder {
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
