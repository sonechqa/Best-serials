<template>
    <div class="form">
        <p class="title">Жанры:</p>
        <div class="genre" v-for="genre in genres" :key="genre.id">
            <input
                type="checkbox"
                :id="genre.id"
                :value="genre.id"
                v-model="checkedGenres"
            />
            <label :for="genre.id">{{ genre.Name }}</label>
        </div>
        <button @click="showSerials">Показать</button>
    </div>
</template>
<script>
import { router } from "@inertiajs/vue3";

export default {
    name: "Filter",
    props: {
        genres: Array,
    },
    data() {
        return {
            checkedGenres: [],
        };
    },
    methods: {
        showSerials() {
            router.get(
                "/",
                { checkedGenres: this.checkedGenres },
                { replace: true }
            );
        },
    },
};
</script>

<style scoped>
.form {
    display: flex;
    flex-direction: column;
}

.title {
    font-weight: 700;
    margin-top: 0;
}

.genre {
    display: flex;
    margin-bottom: 20px;
}

input {
    cursor: pointer;
    margin-right: 5px;
}

label {
    cursor: pointer;
}

button {
    width: min-content;
    height: min-content;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: rgb(126, 202, 72);
    padding: 5px;
}
</style>
