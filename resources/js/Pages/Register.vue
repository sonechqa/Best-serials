<template class="register">
    <MainLayout :user="user" :folders="folders">
        <div class="register__container container">
            <h1 class="register__title">Регистрация</h1>
            <form @submit.prevent="registerUser" class="register__form">
                <div class="register__wrapper">
                    <input
                        type="text"
                        placeholder="Имя"
                        v-model="form.name"
                        class="register__field"
                    />
                </div>
                <div class="register__wrapper">
                    <input
                        type="email"
                        placeholder="Почта"
                        v-model="form.email"
                        class="register__field"
                    />
                </div>
                <div class="register__wrapper">
                    <input
                        type="password"
                        placeholder="Пароль"
                        v-model="form.password"
                        class="register__field"
                    />
                </div>
                <div class="register__wrapper">
                    <input
                        type="password"
                        placeholder="Подтверждение пароля"
                        v-model="form.password_confirmation"
                        class="register__field"
                    />
                </div>
                <button type="submit" class="register__button">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    name: "Register",
    components: {
        MainLayout,
    },
    props: {
        user: Object,
        folders: Array,
    },
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
        };
    },
    methods: {
        registerUser() {
            axios.post("/register", this.form).then(() => {
                router.get("/profile");
            });
        },
    },
};
</script>

<style scoped lang="scss">
.register {
    &__container {
        display: flex;
        flex-direction: column;
        background-color: rgb(239, 231, 231);
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
        outline: none;
        width: 250px;
        height: 40px;
        font-size: 18px;
    }

    &__button {
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: rgb(157, 151, 151);
        padding: 10px 30px;
        font-size: 16px;
    }
}
</style>
