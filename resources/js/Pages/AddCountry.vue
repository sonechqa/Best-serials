<template class="addCountry">
    <MainLayout :user="user" :folders="folders">
        <h1 class="addCountry__title">Добавление страны в список</h1>
        <form @submit.prevent="postCountry" class="addCountry__form">
            <div class="addCountry__wrapper">
                <label for="Name">Название: </label>
                <input type="text" id="Name" v-model="Name" />
            </div>
            <button class="addCountry__button">Добавить</button>
        </form>
        <ExistingCountries :countries="countries" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import axios from "axios";
import ExistingCountries from "../Components/Countries/ExistingCountries.vue";

export default {
    name: "AddCountry",
    components: {
        MainLayout,
        ExistingCountries,
    },
    data() {
        return {
            Name: "",
        };
    },
    props: {
        countries: Array,
        user: Object,
        folders: Array,
    },
    methods: {
        postCountry() {
            axios.post("/addCountry", {
                Name: this.Name,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.addCountry {
    &__title {
        text-align: center;
    }

    &__form {
        margin-left: 50px;
    }

    &__wrapper {
        margin-bottom: 20px;
    }

    &__button {
        border-radius: 5px;
        background-color: rgb(225, 125, 53);
        padding: 8px;
    }
}
</style>
