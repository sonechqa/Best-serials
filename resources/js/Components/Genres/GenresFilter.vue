<template>
    <div class="genresFilter">
        <p class="genresFilter__title">Жанры:</p>
        <div
            class="genresFilter__genre"
            v-for="genre in genres"
            :key="genre.id"
        >
            <input
                type="checkbox"
                :id="'genres' + genre.id"
                :value="genre.id"
                v-model="checkedGenres"
                class="genresFilter__checkbox"
            />
            <label :for="'genres' + genre.id" class="genresFilter__name">{{
                genre.Name
            }}</label>
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

<style scoped lang="scss">
.genresFilter {
    display: flex;
    flex-direction: column;

    &__title {
        font-weight: 700;
        margin-top: 0;
    }

    &__genre {
        display: flex;
        margin-bottom: 20px;
    }

    &__checkbox {
        cursor: pointer;
        margin-right: 5px;
    }

    &__name {
        cursor: pointer;
    }
}
</style>
