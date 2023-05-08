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
        <article class="mt-10">
            <div class="mb-5"></div>
            <slot />
        </article>
    </main>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Header from "../Pages/Header.vue";
</script>

<style scoped>
.links {
    text-align: center;
    margin-top: 10px;
}

.link {
    text-decoration: none;
}

.link:not(:last-child) {
    margin-right: 20px;
}
</style>
