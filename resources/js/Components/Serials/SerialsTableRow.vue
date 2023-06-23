<template class="serialsTableRow">
    <tr class="serialsTableRow__tr">
        <td class="serialsTableRow__td">
            <input type="text" v-model="Name" />
        </td>
        <td class="serialsTableRow__td">
            <img
                :src="Poster"
                alt="Постер сериала"
                class="serialsTableRow__img"
                v-if="image == ''"
            />
            <img
                :src="image"
                alt="Постер сериала"
                class="serialsTableRow__img"
                v-else
            />
            <input
                type="file"
                accept="image/*"
                class="serialsTableRow__file"
                @change="handleSelectedPoster"
            />
        </td>
        <td class="serialsTableRow__td">
            <textarea cols="50" rows="7" v-model="Description"></textarea>
        </td>
        <td class="serialsTableRow__td">
            <textarea rows="5" v-model="Directors"></textarea>
        </td>
        <td class="serialsTableRow__td">
            <input
                type="text"
                class="serialsTableRow__rating"
                v-model="Rating"
                readonly="readonly"
            />
        </td>
        <td class="serialsTableRow__td">
            <input
                type="text"
                class="serialsTableRow__years"
                v-model="ReleaseYears"
            />
        </td>
        <td class="serialsTableRow__td">
            <SelectGenres v-model="Genres" />
        </td>
        <td class="serialsTableRow__td">
            <SelectCountries v-model="Countries" />
        </td>
        <div class="serialsTableRow__buttons">
            <button
                type="button"
                class="serialsTableRow__saveSerial"
                @click="saveData"
            >
                Сохранить
            </button>
            <button
                type="button"
                class="serialsTableRow__deleteSerial"
                @click="deleteSerial"
            >
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
            Rating: this.serial.avg_rating,
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

<style scoped lang="scss">
.serialsTableRow {
    &__tr {
        position: relative;
    }

    &__td {
        padding: 3px;
        border: 1px solid black;
        text-align: center;
    }

    &__img {
        width: 80px;
        height: 120px;
    }

    &__file {
        cursor: pointer;
    }

    &__rating {
        width: 60px;
    }

    &__years {
        width: 100px;
    }

    &__buttons {
        display: flex;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    &__saveSerial {
        margin-left: 10px;
        padding: 5px;
        background-color: rgb(83, 184, 221);
        border-radius: 5px;
    }

    &__deleteSerial {
        margin-left: 10px;
        padding: 10px;
        background-color: rgb(58, 198, 62);
        border-radius: 5px;
    }
}
</style>
