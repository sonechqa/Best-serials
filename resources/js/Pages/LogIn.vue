<template class="logIn">
    <MainLayout :user="user">
        <div class="logIn__container container">
            <h1 class="logIn__title">Авторизация</h1>
            <form @submit.prevent="sendDataToLogIn" class="logIn__form">
                <div class="logIn__wrapper">
                    <input
                        type="email"
                        placeholder="Почта"
                        v-model="form.email"
                        class="logIn__field"
                    />
                </div>
                <div class="logIn__wrapper">
                    <div class="logIn__password">
                        <input
                            type="password"
                            placeholder="Пароль"
                            v-model="form.password"
                            class="logIn__field"
                        />
                    </div>
                    <div class="logIn__error" v-show="errors.message">
                        {{ errors.message }}
                    </div>
                </div>
                <button type="submit" class="logIn__button">Войти</button>
            </form>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    name: "LogIn",
    components: {
        MainLayout,
    },
    props: {
        user: Object,
    },
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            errors: "",
        };
    },
    methods: {
        sendDataToLogIn() {
            axios
                .post("/logIn", this.form)
                .then(() => {
                    router.get("/profile");
                })
                .catch((error) => {
                    this.errors = error.response.data;
                });
        },
    },
};
</script>

<style scoped lang="scss">
.logIn {
    &__container {
        display: flex;
        flex-direction: column;
        background-color: rgb(239, 231, 231);

        @media screen and (max-width: 1100px) {
            width: 80vw;
        }
    }

    &__title {
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    &__form {
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
        text-align: center;
    }

    &__wrapper {
        margin-bottom: 30px;
    }

    &__field {
        width: 250px;
        height: 40px;
        font-size: 18px;

        @media screen and (max-width: 550px) {
            width: 200px;
            height: 35px;
            font-size: 16px;
        }

        @media screen and (max-width: 360px) {
            width: 170px;
            height: 30px;
        }
    }

    &__error {
        color: red;
        margin-top: 5px;
    }

    &__button {
        border-radius: 5px;
        background-color: rgb(157, 151, 151);
        padding: 10px 30px;
        font-size: 16px;
    }
}
</style>
