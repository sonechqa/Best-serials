<template class="addSerial">
    <MainLayout :user="user" :folders="folders">
        <h1 class="addSerial__title">Добавление сериала в список</h1>
        <form @submit.prevent="sendSerial" class="addSerial__form">
            <div class="addSerial__wrapper">
                <label for="Name">Название: </label>
                <input
                    type="text"
                    id="Name"
                    v-model="form.Name"
                    class="addSerial__field"
                />
            </div>
            <div class="addSerial__wrapper">
                <label for="Poster">Постер: </label>
                <input
                    type="file"
                    accept="image/*"
                    id="Poster"
                    class="addSerial__field"
                    @change="handleSelectedPoster"
                />
            </div>
            <div class="addSerial__wrapper">
                <label for="Description">Описание: </label>
                <input
                    type="text"
                    id="Description"
                    v-model="form.Description"
                    class="addSerial__field"
                />
            </div>
            <div class="addSerial__wrapper">
                <label for="Directors">Режиссёры: </label>
                <input
                    type="text"
                    id="Directors"
                    v-model="form.Directors"
                    class="addSerial__field"
                />
            </div>
            <div class="addSerial__wrapper">
                <label for="ReleaseYears">Годы выхода: </label>
                <input
                    type="string"
                    id="ReleaseYears"
                    v-model="form.ReleaseYears"
                    class="addSerial__field"
                />
            </div>
            <div class="addSerial__wrapper addSerial__wrapperForGenres">
                <label for="Genres" class="addSerial__genres">Жанры: </label>
                <SelectGenres id="Genres" v-model="form.Genres" />
            </div>
            <div class="addSerial__wrapper addSerial__wrapperForCountries">
                <label for="Countries" class="addSerial__countries"
                    >Страны:
                </label>
                <SelectCountries id="Countries" v-model="form.Countries" />
            </div>
            <button class="addSerial__button">Добавить</button>
        </form>
        <ExistingSerials :serials="serials" />
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import { router } from "@inertiajs/vue3";
import SelectGenres from "../Components/Genres/SelectGenres.vue";
import SelectCountries from "../Components/Countries/SelectCountries.vue";
import ExistingSerials from "../Components/Serials/ExistingSerials.vue";

export default {
    name: "AddSerial",
    components: {
        MainLayout,
        SelectGenres,
        SelectCountries,
        ExistingSerials,
    },
    props: {
        serials: Array,
        user: Object,
        folders: Array,
    },
    data() {
        return {
            form: {
                Poster: "",
                Name: "",
                Description: "",
                Directors: "",
                ReleaseYears: "",
                Genres: [],
                Countries: [],
            },
            image: "",
        };
    },
    methods: {
        handleSelectedPoster(event) {
            var files = event.target.files;

            if (!files.length) {
                return;
            }

            var fileReader = new FileReader();

            fileReader.onload = (e) => {
                this.image = e.target.result;
            };

            fileReader.readAsDataURL(files[0]);
        },
        sendSerial() {
            const newForm = { ...this.form };
            newForm.Genres = this.form.Genres.map((genre) => genre.id);
            newForm.Countries = this.form.Countries.map(
                (country) => country.id
            );
            newForm.Poster = this.image;
            router.post("/addSerial", newForm);
        },
    },
};
</script>

<style scoped lang="scss">
.addSerial {
    &__title {
        text-align: center;
    }

    &__form {
        margin-left: 50px;
    }

    &__wrapper {
        &:not(:last-child) {
            margin-bottom: 20px;
        }
    }

    &__field {
        outline: none;
        cursor: pointer;
    }

    &__wrapperForGenres,
    &__wrapperForCountries {
        display: flex;
        width: min-content;
    }

    &__genres {
        margin-right: 5px;
    }

    &__countries {
        margin-right: 5px;
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
