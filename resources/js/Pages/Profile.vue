<template class="profile">
    <MainLayout :user="user" :folders="folders">
        <h1 class="profile__title">Мой профиль</h1>
        <div class="profile__container container">
            <div class="profile__wrapper">
                <div class="profile__avatar">
                    <img
                        src="../../images/woman.jpg"
                        alt="Женский аватар"
                        class="profile__img"
                        v-if="
                            !user.Photo && user.Sex == 'Женский' && image == ''
                        "
                    />
                    <img
                        src="../../images/man.jpg"
                        alt="Мужской аватар"
                        class="profile__img"
                        v-else-if="
                            !user.Photo && user.Sex == 'Мужской' && image == ''
                        "
                    />
                    <img
                        :src="user.Photo"
                        alt="Фото пользователя"
                        class="profile__img"
                        v-else-if="image == ''"
                    />
                    <img
                        :src="image"
                        alt="Новое фото пользователя"
                        class="profile__img"
                        v-else-if="image"
                    />
                    <label for="photo">Изменить фото</label>
                    <input
                        type="file"
                        accept="image/*"
                        class="profile__file"
                        @change="handleSelectedImage"
                    />
                    <button
                        type="button"
                        v-if="user.Photo || image"
                        class="profile__deletePhoto profile__button"
                        @click="deletePhoto"
                    >
                        Удалить фотографию
                    </button>
                </div>
                <div>
                    <div class="profile__wrap">
                        <label for="name">Имя:&nbsp;</label>
                        <input type="text" id="name" v-model="user.name" />
                    </div>
                    <div class="profile__wrap">
                        <label for="email">Почта:&nbsp;</label>
                        <input type="text" id="email" v-model="user.email" />
                    </div>
                    <div class="profile__wrap">
                        <label for="birth">Дата рождения:&nbsp;</label>
                        <input
                            type="date"
                            id="birth"
                            min="1930-01-01"
                            max="2016-12-31"
                            v-model="user.DateOfBirth"
                        />
                    </div>
                    <div class="profile__sex">
                        <span>Пол:&nbsp;</span>
                        <div>
                            <input
                                type="radio"
                                id="female"
                                value="Женский"
                                v-model="user.Sex"
                            />
                            <label for="female">Жен.</label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                id="male"
                                value="Мужской"
                                v-model="user.Sex"
                            />
                            <label for="male">Муж.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile__buttons">
                <button
                    type="button"
                    class="profile__save profile__button"
                    @click="saveProfile"
                >
                    Сохранить всё
                </button>
                <button
                    type="button"
                    class="profile__logout profile__button"
                    @click.prevent="logout"
                >
                    Выйти из профиля
                </button>
                <button
                    type="button"
                    class="profile__delete profile__button"
                    @click="deleteProfile"
                >
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
.profile {
    &__title {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 0;
    }

    &__container {
        background-color: white;
        padding: 50px;

        @media screen and (max-width: 1280px) {
            width: 70vw;
        }

        @media screen and (max-width: 430px) {
            width: 60vw;
        }
    }

    &__wrapper {
        display: flex;
        margin-bottom: 180px;

        @media screen and (max-width: 670px) {
            flex-direction: column;
            align-items: center;
            margin-bottom: 100px;
        }
    }

    &__avatar {
        width: 220px;
        height: 220px;
        margin-right: 50px;
        text-align: center;

        @media screen and (max-width: 710px) {
            margin-right: 20px;
        }

        @media screen and (max-width: 670px) {
            margin-bottom: 100px;
        }
    }

    &__img {
        width: 100%;
        height: 100%;
        object-fit: cover;

        @media screen and (max-width: 1100px) {
            width: 80%;
            height: 80%;
        }
    }

    &__file {
        cursor: pointer;
    }

    &__button {
        border-radius: 5px;
        padding: 10px;
    }

    &__deletePhoto {
        margin-top: 30px;
        background-color: rgb(221, 179, 38);
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(224, 191, 83);
            transition: background-color 0.3s;
        }
    }

    &__wrap {
        margin-bottom: 15px;

        @media screen and (max-width: 380px) {
            display: flex;
            flex-direction: column;
        }
    }

    &__sex {
        display: flex;
    }

    &__buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 150px;

        @media screen and (max-width: 565px) {
            flex-direction: column;
            width: 50%;
            margin: auto;
        }
    }

    &__save {
        background-color: rgb(68, 207, 68);
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(124, 229, 124);
            transition: background-color 0.3s;
        }

        @media screen and (max-width: 565px) {
            margin-bottom: 10px;
        }
    }

    &__logout {
        background-color: rgb(86, 169, 229);
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(109, 183, 236);
            transition: background-color 0.3s;
        }

        @media screen and (max-width: 565px) {
            margin-bottom: 10px;
        }
    }

    &__delete {
        background-color: rgb(213, 76, 76);
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(226, 108, 108);
            transition: background-color 0.3s;
        }
    }
}
</style>
