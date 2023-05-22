<template>
    <MainLayout>
        <h1 class="title">Мой профиль</h1>
        <div>
            <div>Имя: {{ user.name }}</div>
            <div>Почта: {{ user.email }}</div>
        </div>
        <button type="button" class="logout" @click.prevent="logout">
            Выйти
        </button>
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
        logout() {
            axios.post("/logout").then(() => {
                router.get("/");
            });
        },
    },
};
</script>

<style scoped>
.title {
    text-align: center;
}

.logout {
    cursor: pointer;
    border: none;
    border-radius: 5px;
}
</style>
