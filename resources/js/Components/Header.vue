<template>
    <div class="header">
        <h1 class="header__title">
            <a href="/" class="header__link">Лучшие сериалы</a>
        </h1>
        <div class="header__search">
            <form class="header__form" @submit.prevent="searchSerials">
                <input
                    type="text"
                    placeholder="Поиск сериалов"
                    v-model="inputValue"
                    class="header__input"
                    @focus="showVariants"
                    @blur="hideVariants"
                    @input="getSuggestedSerials"
                />
                <button type="submit" class="header__button"></button>
            </form>
            <div
                class="header__wrapper"
                v-show="variantsVisibility && suggestedSerials.length > 0"
            >
                <ul class="header__variants">
                    <li
                        v-for="(suggestedSerial, index) in suggestedSerials"
                        :key="suggestedSerial.id"
                        class="header__variant"
                        @click="() => showSerial(index)"
                    >
                        {{ suggestedSerial.Name }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="header__profile" v-if="user.name">
            <a href="/profile">
                <img src="../../images/user.png" alt="" class="header__user" />
            </a>
        </div>
        <div class="header__register" v-else>
            <a href="/logIn" class="header__logIn">Войти</a>
            <a href="/register" class="header__signUp">Зарегистрироваться</a>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    name: "Header",
    data() {
        return {
            inputValue: "",
            variantsVisibility: false,
            suggestedSerials: [],
            user: {},
        };
    },
    methods: {
        showVariants() {
            this.variantsVisibility = true;
        },
        hideVariants() {
            setTimeout(() => {
                this.variantsVisibility = false;
            }, 50);
        },
        getSuggestedSerials() {
            axios
                .post("/getSerial", {
                    input: this.inputValue,
                })
                .then((res) => {
                    this.suggestedSerials = res.data;
                    if (this.inputValue === "") {
                        this.suggestedSerials = [];
                    }
                });
        },
        showSerial(index) {
            const id = this.suggestedSerials[index].id;
            router.get("/serials/" + id, {}, { replace: true });
        },
        searchSerials() {
            router.get(
                "/search",
                { search: this.inputValue },
                { replace: true }
            );
        },
    },
    mounted() {
        axios.get("/api/user").then((res) => {
            this.user = res.data;
        });
    },
};
</script>

<style>
.header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: rgb(34, 31, 31);
}

.header__title {
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    font-style: italic;
}

.header__link {
    text-decoration: none;
    color: white;
}

.header__search {
    position: relative;
}

.header__form {
    display: flex;
    padding: 2px;
    background-color: white;
    border-radius: 5px;
}

.header__input {
    border: none;
    margin: 0;
    padding: 7px;
    color: inherit;
    border: 1px solid transparent;
    border-radius: inherit;
    outline: none;
}

.header__button {
    background-image: url("../../images/loupe.png");
    background-size: 20px;
    background-repeat: no-repeat;
    background-position: center;
    width: 50px;
    cursor: pointer;
    background-color: transparent;
    overflow: hidden;
    padding: 0;
    margin: 0;
    border-radius: inherit;
    border: 1px solid transparent;
}

.header__wrapper {
    border: 1px solid black;
    background-color: white;
    border-radius: 5px;
    margin-top: 5px;
    position: absolute;
    width: 100%;
}

.header__variants {
    margin-top: 0;
    margin-bottom: 10px;
    padding-left: 5px;
}

.header__variant {
    list-style-type: none;
    cursor: pointer;
    padding-top: 10px;
}

.header__logIn {
    color: white;
    text-decoration: none;
    margin-right: 30px;
}

.header__signUp {
    color: white;
    text-decoration: none;
}

.header__profile {
    cursor: pointer;
}

.header__user {
    width: 40px;
    height: 40px;
}
</style>
