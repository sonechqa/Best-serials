<template>
    <main class="mainLayout">
        <header>
            <Header :user="user"></Header>
            <div class="mainLayout__links">
                <Link href="/addSerial" class="mainLayout__link">
                    Добавить сериал
                </Link>
                <Link href="/addGenre" class="mainLayout__link">
                    Добавить жанр
                </Link>
                <Link href="/addCountry" class="mainLayout__link">
                    Добавить страну
                </Link>
            </div>
        </header>
        <article>
            <div></div>
            <slot />
        </article>
    </main>
</template>

<script>
import Header from "../Components/Header.vue";
import { Link } from "@inertiajs/vue3";

export default {
    name: "MainLayout",
    components: {
        Header,
        Link,
    },
    props: {
        user: Object,
    },
};
</script>

<style scoped lang="scss">
.mainLayout {
    &__links {
        text-align: center;
        margin-top: 30px;
    }

    &__link {
        text-decoration: none;
        font-family: Roboto;
        color: black;
        transition: color 0.3s;

        &:hover {
            color: rgb(43, 35, 35);
            transition: color 0.3s;
        }

        &:not(:last-child) {
            margin-right: 20px;
        }
    }
}
</style>
