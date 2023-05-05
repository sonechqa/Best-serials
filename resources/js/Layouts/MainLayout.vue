<template>
    <main>
        <header>
            <Header></Header>
            <Link href="/add" class="px-3 py-2 bg-gray-300 rounded mr-2">
                Add serial
            </Link>
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
