<template>
    <div class="container">
        <div class="wrapper">
            <div class="posterAndFolder">
                <img
                    :src="'/' + serial.Poster"
                    alt="Постер сериала"
                    class="poster"
                />
                <div class="wrap">
                    <button type="button" class="addToFolder" @click="toggle">
                        Добавить в папку
                    </button>
                    <div
                        class="folders"
                        v-if="foldersVisibility"
                        v-click-away="away"
                    >
                        <span
                            v-for="(folder, index) in folders"
                            :key="folder"
                            class="folder"
                            @click="() => attach(index)"
                        >
                            {{ folder.Name }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="properties">
                <h1>{{ serial.Name }}</h1>
                <h3>О сериале</h3>
                <p class="years">Год выхода: {{ serial.ReleaseYears }}</p>
                <div class="countries">
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
                <div class="genres">
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
                <p class="directors">Режиссёры: {{ serial.Directors }}</p>
            </div>
            <span
                class="rating"
                v-bind:class="{
                    green: serial.Rating >= 7,
                    red: serial.Rating < 7,
                }"
                >{{ serial.Rating }}
            </span>
        </div>
        <div class="description">
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
.container {
    background-color: white;
    padding: 50px;
}

.wrapper {
    display: flex;
    border-bottom: 1px inset black;
    padding-bottom: 50px;
}

.posterAndFolder {
    display: flex;
    flex-direction: column;
}

.poster {
    width: 300px;
    height: 450px;
    margin-bottom: 50px;
}

.wrap {
    position: relative;
}

.addToFolder {
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

.folders {
    display: flex;
    flex-direction: column;
    border: 1px solid gray;
    border-radius: 5px;
    margin-top: 5px;
    position: absolute;
    width: 100%;
    background-color: white;
}

.folder {
    cursor: pointer;
    padding: 10px;
    transition: background-color 0.3s;

    &:hover {
        background-color: rgb(211, 209, 209);
        transition: background-color 0.3s;
    }
}

.properties {
    margin-left: 40px;
}

h1 {
    margin-top: 0;
}

.countries {
    display: flex;
    margin-bottom: 16px;
}

.genres {
    display: flex;
}

.rating {
    font-size: 20px;
    width: 50px;
    height: min-content;
    text-align: center;
    margin-left: auto;
    margin-right: 30px;
}

.rating.green {
    color: rgb(4, 150, 4);
}

.rating.red {
    color: red;
}

.description {
    width: 700px;
    line-height: 25px;
}
</style>
