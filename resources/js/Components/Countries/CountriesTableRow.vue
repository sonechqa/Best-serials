<template>
    <tr class="countriesTableRow">
        <td class="countriesTableRow__td">
            <input type="text" v-model="Name" />
        </td>
        <div class="countriesTableRow__buttons">
            <button
                type="button"
                class="countriesTableRow__saveCountry"
                @click="saveCountry"
            >
                Сохранить
            </button>
            <button
                type="button"
                class="countriesTableRow__deleteCountry"
                @click="deleteCountry"
            >
                Удалить страну
            </button>
        </div>
    </tr>
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    name: "CountriesTableRow",
    data() {
        return {
            Name: this.country.Name,
        };
    },
    props: {
        country: Object,
    },
    methods: {
        saveCountry() {
            router.post("/updateCountry", {
                id: this.country.id,
                Name: this.Name,
            });
        },

        deleteCountry() {
            router.post("/deleteCountry", {
                id: this.country.id,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.countriesTableRow {
    position: relative;

    &__td {
        padding: 3px;
        border: 1px solid black;
        text-align: center;
        height: 40px;
    }

    &__buttons {
        display: flex;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    &__saveCountry {
        margin-left: 10px;
        background-color: rgb(83, 184, 221);
        border-radius: 5px;

        @media screen and (max-width: 365px) {
            padding: 0px;
        }

        @media screen and (max-width: 330px) {
            margin-left: 5px;
        }
    }

    &__deleteCountry {
        margin-left: 10px;
        padding: 0px 15px;
        background-color: rgb(58, 198, 62);
        border-radius: 5px;

        @media screen and (max-width: 365px) {
            padding: 0px 5px;
        }

        @media screen and (max-width: 330px) {
            margin-left: 5px;
        }
    }
}
</style>
