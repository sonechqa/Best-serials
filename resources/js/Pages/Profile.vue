<template>
    <MainLayout>
        <h1 class="title">Мой профиль</h1>
        <div class="container">
            <div class="wrapper">
                <div class="avatar">
                    <img
                        src="../../images/woman.jpg"
                        alt="Фото пользователя"
                        v-if="!user.Photo && user.Sex == 'Женский'"
                    />
                    <img
                        src="../../images/man.jpg"
                        alt="Фото пользователя"
                        v-else-if="!user.Photo && user.Sex == 'Мужской'"
                    />
                    <img :src="user.Photo" alt="Фото пользователя" v-else />
                    <label for="photo">Изменить фото</label>
                    <input type="text" id="photo" v-model="user.Photo" />
                </div>
                <div class="personalData">
                    <div class="name">
                        <label for="name">Имя: </label>
                        <input type="text" id="name" v-model="user.name" />
                    </div>
                    <div class="email">
                        <label for="email">Почта: </label>
                        <input type="text" id="email" v-model="user.email" />
                    </div>
                    <div class="dateBirth">
                        <label for="birth">Дата рождения: </label>
                        <input
                            type="date"
                            id="birth"
                            min="1930-01-01"
                            max="2016-12-31"
                            v-model="user.DateOfBirth"
                        />
                    </div>
                    <div class="sex">
                        <span>Пол:&nbsp;</span>
                        <div>
                            <input
                                type="radio"
                                id="female"
                                value="Женский"
                                v-model="user.Sex"
                            />
                            <label for="female">Женский</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="male"
                                value="Мужской"
                                v-model="user.Sex"
                            />
                            <label for="male">Мужской</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button type="button" class="save" @click="saveProfile">
                    Сохранить всё
                </button>
                <button type="button" class="logout" @click.prevent="logout">
                    Выйти из профиля
                </button>
                <button type="button" class="delete" @click="deleteProfile">
                    Удалить профиль
                </button>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    name: "Profile",
    components: {
        MainLayout,
    },
    data() {
        return {
            user: {},
        };
    },
    mounted() {
        axios.get("/api/user").then((res) => {
            this.user = res.data;
        });
    },
    methods: {
        saveProfile() {
            router.post("/updateProfile", {
                name: this.user.name,
                email: this.user.email,
                photo: this.user.Photo,
                sex: this.user.Sex,
                dateOfBirth: this.user.DateOfBirth,
            });
        },
        logout() {
            axios.post("/logout").then(() => {
                router.get("/");
            });
        },
        deleteProfile() {
            axios.post("/deleteProfile").then(() => {
                router.get("/");
            });
        },
    },
};
</script>

<style scoped>
.title {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 0;
}

.container {
    width: 1000px;
    margin: auto;
    margin-top: 50px;
    background-color: white;
    padding: 50px;
    border: 1px solid black;
    box-shadow: 0px 0px 25px 13px rgb(50, 49, 49);
}

.wrapper {
    display: flex;
}

.avatar {
    width: 220px;
    height: 220px;
    margin-right: 50px;
    text-align: center;
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.name,
.email,
.dateBirth {
    margin-bottom: 15px;
}

.sex {
    display: flex;
}

input {
    outline: none;
}

.buttons {
    margin-top: 100px;
    display: flex;
    justify-content: space-around;
}

button {
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 10px;
}

.change {
    background-color: rgb(185, 181, 181);
    transition: background-color 0.3s;
}

.change:hover {
    background-color: rgb(206, 202, 202);
    transition: background-color 0.3s;
}

.save {
    background-color: rgb(68, 207, 68);
    transition: background-color 0.3s;
}

.save:hover {
    background-color: rgb(124, 229, 124);
    transition: background-color 0.3s;
}

.logout {
    background-color: rgb(86, 169, 229);
    transition: background-color 0.3s;
}

.logout:hover {
    background-color: rgb(109, 183, 236);
    transition: background-color 0.3s;
}

.delete {
    background-color: rgb(213, 76, 76);
    transition: background-color 0.3s;
}

.delete:hover {
    background-color: rgb(226, 108, 108);
    transition: background-color 0.3s;
}
</style>
