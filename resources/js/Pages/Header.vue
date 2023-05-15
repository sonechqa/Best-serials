<template>
    <div class="header">
        <h1 class="header__title">
            <a href="/" class="header__link">Лучшие сериалы</a>
        </h1>
        <form class="header__form">
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
        <div v-show="variantsVisibility && suggestedSerials.length > 0">
            <ul>
                <li
                    v-for="suggestedSerial in suggestedSerials"
                    :key="suggestedSerial"
                >
                    {{ suggestedSerial.Name }}
                </li>
            </ul>
        </div>
        <div class="header__profile">
            <a href="/profile">
                <img src="../../images/user.png" alt="" class="header__user" />
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Header",
    data() {
        return {
            inputValue: "",
            variantsVisibility: false,
            suggestedSerials: [],
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

.header__profile {
    cursor: pointer;
}

.header__user {
    width: 40px;
    height: 40px;
}
</style>
