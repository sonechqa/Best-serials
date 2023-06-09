<template class="serialDescription">
    <div class="serialDescription__container container">
        <div class="serialDescription__wrapper">
            <div class="serialDescription__posterAndFolder">
                <img
                    :src="'/' + serial.Poster"
                    alt="Постер сериала"
                    class="serialDescription__poster"
                />
                <div class="serialDescription__wrapperForFolders">
                    <button
                        type="button"
                        class="serialDescription__addToFolder"
                        @click="toggle"
                    >
                        Добавить в папку
                    </button>
                    <div
                        class="serialDescription__folders"
                        v-if="foldersVisibility"
                        v-click-away="away"
                    >
                        <span
                            v-for="(folder, index) in folders"
                            :key="folder"
                            class="serialDescription__folder"
                            @click="() => attach(index)"
                        >
                            {{ folder.Name }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="serialDescription__properties">
                <h1 class="serialDescription__name">{{ serial.Name }}</h1>
                <h3>О сериале</h3>
                <p>Год выхода: {{ serial.ReleaseYears }}</p>
                <div class="serialDescription__countries">
                    <span>Страна:&nbsp;</span>
                    <div
                        v-for="(country, index) in serial.countries"
                        :key="country.id"
                    >
                        {{ country.Name
                        }}<span v-if="index != serial.countries.length - 1"
                            >,&nbsp;</span
                        >
                    </div>
                </div>
                <div class="serialDescription__genres">
                    <span>Жанры:&nbsp;</span>
                    <div
                        v-for="(genre, index) in serial.genres"
                        :key="genre.id"
                    >
                        {{ genre.Name
                        }}<span v-if="index != serial.genres.length - 1"
                            >,&nbsp;
                        </span>
                    </div>
                </div>
                <p>Режиссёры: {{ serial.Directors }}</p>
            </div>
            <span
                class="serialDescription__rating"
                v-bind:class="{
                    serialDescription__greenRating: serial.Rating >= 7,
                    serialDescription__redRating: serial.Rating < 7,
                }"
                >{{ serial.Rating }}
            </span>
        </div>
        <div class="serialDescription__description">
            <h3>Описание сериала</h3>
            <div>{{ serial.Description }}</div>
        </div>
    </div>
</template>

<script>
import { mixin as VueClickAway } from "vue3-click-away";
import axios from "axios";

export default {
    name: "SerialDescription",
    props: {
        serial: Object,
        folders: Array,
    },
    data() {
        return {
            foldersVisibility: false,
            folderId: "",
        };
    },
    mixins: [VueClickAway],
    methods: {
        toggle() {
            this.foldersVisibility = !this.foldersVisibility;
        },
        away() {
            this.foldersVisibility = false;
        },
        attach(index) {
            axios.post("/addSerialInFolder", {
                folderId: this.folders[index].id,
                serialId: this.serial.id,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.serialDescription {
    &__container {
        background-color: white;
        padding: 50px;
    }

    &__wrapper {
        display: flex;
        border-bottom: 1px inset black;
        padding-bottom: 50px;
    }

    &__posterAndFolder {
        display: flex;
        flex-direction: column;
    }

    &__poster {
        width: 300px;
        height: 450px;
        margin-bottom: 50px;
    }

    &__wrapperForFolders {
        position: relative;
    }

    &__addToFolder {
        cursor: pointer;
        border: none;
        border-radius: 5px;
        padding: 10px;
        background-color: rgb(186, 174, 174);
        transition: background-color 0.3s;
        width: 100%;

        &:hover {
            background-color: rgb(202, 194, 194);
            transition: background-color 0.3s;
        }
    }

    &__folders {
        display: flex;
        flex-direction: column;
        border: 1px solid gray;
        border-radius: 5px;
        margin-top: 5px;
        position: absolute;
        background-color: white;
    }

    &__folder {
        cursor: pointer;
        padding: 10px;
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(211, 209, 209);
            transition: background-color 0.3s;
        }
    }

    &__properties {
        margin-left: 40px;
    }

    &__name {
        margin-top: 0;
    }

    &__countries {
        display: flex;
        margin-bottom: 16px;
    }

    &__genres {
        display: flex;
    }

    &__rating {
        font-size: 20px;
        width: 50px;
        height: min-content;
        text-align: center;
        margin-left: auto;
        margin-right: 30px;
    }

    &__greenRating {
        color: rgb(4, 150, 4);
    }

    &__redRating {
        color: red;
    }

    &__description {
        width: 700px;
        line-height: 25px;
    }
}
</style>
