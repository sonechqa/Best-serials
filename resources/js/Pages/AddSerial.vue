<script setup>
import MainLayout from "../Layouts/MainLayout.vue";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import ExistingSerials from "../Components/Serials/ExistingSerials.vue";
import SelectGenres from "../Components/Genres/SelectGenres.vue";
import SelectCountries from "../Components/Countries/SelectCountries.vue";

const form = reactive({
    Poster: null,
    Name: null,
    Description: null,
    Directors: null,
    Rating: null,
    ReleaseYears: null,
    Genres: [],
    Countries: [],
});

function submit() {
    const newForm = { ...form };
    newForm.Genres = form.Genres.map((genre) => genre.id);
    newForm.Countries = form.Countries.map((country) => country.id);
    router.post("/addSerial", newForm);
}

defineProps({
    serials: Array,
    user: Object,
});
</script>

<template>
    <MainLayout :user="user">
        <h1>Добавление сериала в список</h1>
        <form @submit.prevent="submit">
            <div class="wrapperFor">
                <label for="Name">Название: </label>
                <input type="text" id="Name" v-model="form.Name" />
            </div>
            <div class="wrapperFor">
                <label for="Poster">Постер: </label>
                <input type="text" id="Poster" v-model="form.Poster" />
            </div>
            <div class="wrapperFor">
                <label for="Description">Описание: </label>
                <input
                    type="text"
                    id="Description"
                    v-model="form.Description"
                />
            </div>
            <div class="wrapperFor">
                <label for="Directors">Режиссёры: </label>
                <input type="text" id="Directors" v-model="form.Directors" />
            </div>
            <div class="wrapperFor">
                <label for="Rating">Рейтинг: </label>
                <input
                    type="number"
                    step="0.1"
                    id="Rating"
                    v-model="form.Rating"
                />
            </div>
            <div class="wrapperFor">
                <label for="ReleaseYears">Годы выхода: </label>
                <input
                    type="string"
                    id="ReleaseYears"
                    v-model="form.ReleaseYears"
                />
            </div>
            <div class="wrapperFor wrapperForGenres">
                <label for="Genres" class="genres">Жанры: </label>
                <SelectGenres id="Genres" v-model="form.Genres"></SelectGenres>
            </div>
            <div class="wrapperFor wrapperForCountries">
                <label for="Countries" class="countries">Страны: </label>
                <SelectCountries
                    id="Countries"
                    v-model="form.Countries"
                ></SelectCountries>
            </div>
            <button>Добавить</button>
        </form>
        <ExistingSerials :serials="serials"></ExistingSerials>
    </MainLayout>
</template>

<style scoped>
h1 {
    text-align: center;
}

form {
    margin-left: 50px;
}

.wrapperForGenres {
    display: flex;
}

.genres {
    margin-right: 5px;
}

.wrapperForCountries {
    display: flex;
}

.countries {
    margin-right: 5px;
}

input {
    outline: none;
}

.wrapperFor:not(:last-child) {
    margin-bottom: 20px;
}
</style>
