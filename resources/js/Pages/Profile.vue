<template>
    <MainLayout :user="user" :folders="folders">
        <h1 class="title">Мой профиль</h1>
        <div class="container">
            <div class="wrapper">
                <div class="avatar">
                    <img
                        src="../../images/woman.jpg"
                        alt="Женский аватар"
                        v-if="
                            !user.Photo && user.Sex == 'Женский' && image == ''
                        "
                    />
                    <img
                        src="../../images/man.jpg"
                        alt="Мужской аватар"
                        v-else-if="
                            !user.Photo && user.Sex == 'Мужской' && image == ''
                        "
                    />
                    <img
                        :src="user.Photo"
                        alt="Фото пользователя"
                        v-else-if="image == ''"
                    />
                    <img
                        :src="image"
                        alt="Новое фото пользователя"
                        v-else-if="image"
                    />
                    <label for="photo">Изменить фото</label>
                    <input
                        type="file"
                        accept="image/*"
                        class="file"
                        @change="handleSelectedImage"
                    />
                    <button
                        type="button"
                        v-if="user.Photo || image"
                        class="deletePhoto"
                        @click="deletePhoto"
                    >
                        Удалить фотографию
                    </button>
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
            image: "",
        };
    },
    props: {
        user: Object,
        folders: Array,
    },
    methods: {
        saveProfile() {
            router.post("/updateProfile", {
                name: this.user.name,
                email: this.user.email,
                photo: this.image,
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
            router.post("/deleteProfile");
        },

        handleSelectedImage(event) {
            var files = event.target.files;

            if (!files.length) {
                return;
            }

            var fileReader = new FileReader();

            fileReader.onload = (e) => {
                this.image = e.target.result;
            };

            fileReader.readAsDataURL(files[0]);
        },

        deletePhoto() {
            router.post("/deletePhoto");
        },
    },
};
</script>

<style scoped lang="scss">
.title {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 0;
}

.container {
    background-color: white;
    padding: 50px;
}

.wrapper {
    display: flex;
    margin-bottom: 180px;
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

.file {
    cursor: pointer;
}

.deletePhoto {
    margin-top: 30px;
    background-color: rgb(221, 179, 38);
    transition: background-color 0.3s;

    &:hover {
        background-color: rgb(224, 191, 83);
        transition: background-color 0.3s;
    }
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

    &:hover {
        background-color: rgb(206, 202, 202);
        transition: background-color 0.3s;
    }
}

.save {
    background-color: rgb(68, 207, 68);
    transition: background-color 0.3s;

    &:hover {
        background-color: rgb(124, 229, 124);
        transition: background-color 0.3s;
    }
}

.logout {
    background-color: rgb(86, 169, 229);
    transition: background-color 0.3s;

    &:hover {
        background-color: rgb(109, 183, 236);
        transition: background-color 0.3s;
    }
}

.delete {
    background-color: rgb(213, 76, 76);
    transition: background-color 0.3s;

    &:hover {
        background-color: rgb(226, 108, 108);
        transition: background-color 0.3s;
    }
}
</style>
