<template>
    <MainLayout>
        <div class="container">
            <h1 class="title">Авторизация</h1>
            <form @submit.prevent="sendDataToLogIn">
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
                <button type="submit">Войти</button>
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
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        sendDataToLogIn() {
            axios.post("/logIn", this.form).then(() => {
                router.get("/");
            });
        },
    },
};
</script>

<style scoped>
.container {
    width: 1000px;
    display: flex;
    flex-direction: column;
    margin: auto;
    margin-top: 50px;
    border: 1px solid black;
    box-shadow: 0px 0px 25px 13px rgb(50, 49, 49);
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

.login,
.password {
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
