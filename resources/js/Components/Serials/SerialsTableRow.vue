<template>
    <tr>
        <td>
            <input type="text" v-model="Name" />
        </td>
        <td>
            <img :src="Poster" alt="Постер сериала" v-if="image == ''" />
            <img :src="image" alt="Постер сериала" v-else />
            <input
                type="file"
                accept="image/*"
                class="file"
                @change="handleSelectedPoster"
            />
        </td>
        <td>
            <textarea cols="50" rows="7" v-model="Description"></textarea>
        </td>
        <td>
            <textarea rows="5" v-model="Directors"></textarea>
        </td>
        <td>
            <input type="text" class="rating" v-model="Rating" />
        </td>
        <td>
            <input type="text" class="years" v-model="ReleaseYears" />
        </td>
        <td>
            <SelectGenres v-model="Genres"></SelectGenres>
        </td>
        <td>
            <SelectCountries v-model="Countries"></SelectCountries>
        </td>
        <div class="buttons">
            <button type="button" class="saveSerial" @click="saveData">
                Сохранить
            </button>
            <button type="button" class="deleteSerial" @click="deleteSerial">
                Удалить сериал
            </button>
        </div>
    </tr>
</template>

<script>
import { router } from "@inertiajs/vue3";
import SelectGenres from "../Genres/SelectGenres.vue";
import SelectCountries from "../Countries/SelectCountries.vue";

export default {
    name: "SerialsTableRow",
    components: {
        SelectGenres,
        SelectCountries,
    },
    props: {
        serial: Object,
    },
    data() {
        return {
            Name: this.serial.Name,
            Poster: this.serial.Poster,
            Description: this.serial.Description,
            Directors: this.serial.Directors,
            Rating: this.serial.Rating,
            ReleaseYears: this.serial.ReleaseYears,
            Genres: this.serial.genres,
            Countries: this.serial.countries,
            image: "",
        };
    },
    methods: {
        saveData() {
            router.post("/update", {
                id: this.serial.id,
                Name: this.Name,
                Poster: this.image,
                Description: this.Description,
                Directors: this.Directors,
                Rating: this.Rating,
                ReleaseYears: this.ReleaseYears,
                Genres: this.Genres.map((genre) => genre.id),
                Countries: this.Countries.map((country) => country.id),
            });
        },

        deleteSerial() {
            router.post("/deleteSerial", {
                id: this.serial.id,
            });
        },

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
}

img {
    width: 80px;
    height: 120px;
}

textarea {
    resize: none;
}

.file {
    cursor: pointer;
}

.rating {
    width: 60px;
}

.years {
    width: 100px;
}

.buttons {
    display: flex;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.saveSerial {
    margin-left: 10px;
    padding: 5px;
    background-color: rgb(83, 184, 221);
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.deleteSerial {
    margin-left: 10px;
    padding: 10px;
    background-color: rgb(58, 198, 62);
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
