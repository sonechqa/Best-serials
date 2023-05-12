<template>
    <div class="form">
        <p class="title">Жанры:</p>
        <div class="genre" v-for="genre in genres" :key="genre.id">
            <input
                type="checkbox"
                :id="'genres' + genre.id"
                :value="genre.id"
                v-model="checkedGenres"
            />
            <label :for="'genres' + genre.id">{{ genre.Name }}</label>
        </div>
    </div>
</template>
<script>
export default {
    name: "Filter",
    props: {
        genres: Array,
        selectedGenres: Array,
    },
    data() {
        return {
            checkedGenres: this.selectedGenres || [],
        };
    },
    watch: {
        checkedGenres(newGenres) {
            this.$emit("update:modelValue", newGenres);
        },
    },
    emits: ["update:modelValue"],
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
</style>
