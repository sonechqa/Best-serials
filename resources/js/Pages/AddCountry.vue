<template>
    <h1>Добавление страны в список</h1>
    <form @submit.prevent="postCountry">
        <div>
            <label for="Name">Название: </label>
            <input type="text" id="Name" v-model="Name" />
        </div>
        <button>Добавить</button>
    </form>
    <ExistingCountries :countries="countries"></ExistingCountries>
</template>

<script>
import axios from "axios";
import ExistingCountries from "../Components/ExistingCountries.vue";

export default {
    name: "AddCountry",
    components: {
        ExistingCountries,
    },
    data() {
        return {
            Name: "",
        };
    },
    props: {
        countries: Array,
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
