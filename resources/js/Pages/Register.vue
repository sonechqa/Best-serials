<template>
    <MainLayout>
        <div class="container">
            <h1 class="title">Регистрация</h1>
            <form @submit.prevent="registerUser">
                <div class="name">
                    <input type="text" placeholder="Имя" v-model="form.name" />
                </div>
                <div class="login">
                    <input
                        type="email"
                        placeholder="Почта"
                        v-model="form.email"
                    />
                </div>
                <div class="password">
                    <input
                        type="password"
                        placeholder="Пароль"
                        v-model="form.password"
                    />
                </div>
                <div class="password_confirmation">
                    <input
                        type="password"
                        placeholder="Подтверждение пароля"
                        v-model="form.password_confirmation"
                    />
                </div>
                <button type="submit">Зарегистрироваться</button>
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

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    background-color: rgb(239, 231, 231);
}

.title {
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: 40px;
}

form {
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    text-align: center;
}

.name,
.login,
.password,
.password_confirmation {
    margin-bottom: 30px;
}

input {
    outline: none;
    width: 250px;
    height: 40px;
    font-size: 18px;
}

button {
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: rgb(157, 151, 151);
    padding: 10px 30px;
    font-size: 16px;
}
</style>
