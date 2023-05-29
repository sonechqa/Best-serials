<template>
    <main>
        <header>
            <Header></Header>
            <div class="links">
                <Link href="/addSerial" class="link"> Добавить сериал </Link>
                <Link href="/addGenre" class="link"> Добавить жанр </Link>
                <Link href="/addCountry" class="link"> Добавить страну </Link>
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
};
</script>

<style scoped>
.links {
    text-align: center;
    margin-top: 30px;
}

.link {
    text-decoration: none;
    font-family: Roboto;
    color: black;
    transition: color 0.3s;
}

.link:hover {
    color: rgb(43, 35, 35);
    transition: color 0.3s;
}

.link:not(:last-child) {
    margin-right: 20px;
}
</style>
