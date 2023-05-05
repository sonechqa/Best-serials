<template>
    <tr>
        <td>
            <input type="text" v-model="Name" />
        </td>
        <td>
            <textarea cols="60" rows="5" v-model="Description"></textarea>
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
        <button type="button" class="save" @click="saveData">Сохранить</button>
    </tr>
</template>

<script>
import { router } from "@inertiajs/vue3";
import SelectGenres from "../Components/SelectGenres.vue";
import SelectCountries from "../Components/SelectCountries.vue";

export default {
    name: "TableRow",
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
            Description: this.serial.Description,
            Directors: this.serial.Directors,
            Rating: this.serial.Rating,
            ReleaseYears: this.serial.ReleaseYears,
            Genres: this.serial.genres,
            Countries: this.serial.Countries,
        };
    },
    methods: {
        saveData() {
            router.post("/update", {
                id: this.serial.id,
                Name: this.Name,
                Description: this.Description,
                Directors: this.Directors,
                Rating: this.Rating,
                ReleaseYears: this.ReleaseYears,
                Genres: this.Genres.map((genre) => genre.id),
                Countries: this.Countries.map((country) => country.id),
            });
        },
    },
};
</script>

<style>
tr {
    position: relative;
}

textarea {
    resize: none;
}

.rating {
    width: 80px;
}

.years {
    width: 120px;
}

.save {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    margin-left: 10px;
    padding: 10px 5px;
    background-color: rgb(83, 184, 221);
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
