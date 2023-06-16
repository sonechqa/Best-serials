<template class="serialRating">
    <star-rating
        :rating="serialRating"
        :max-rating="10"
        :round-start-rating="false"
        :increment="0.5"
        :clearable="true"
        :animate="true"
        :inline="true"
        :star-size="40"
        @update:rating="rating = $event"
    >
    </star-rating>
    <div v-show="rating > 0" class="serialRating__userRating">
        Моя оценка: {{ rating }}
        <button class="serialRating__button" type="button" @click="saveRating">
            Сохранить оценку
        </button>
    </div>
</template>

<script>
import StarRating from "vue-star-rating";
import { router } from "@inertiajs/vue3";

export default {
    name: "SerialRating",
    components: {
        StarRating,
    },
    props: {
        serialRating: Number,
    },
    data() {
        return {
            rating: 0,
        };
    },
    methods: {
        saveRating() {
            router.post("/rating", {
                rating: this.rating,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.serialRating {
    &__userRating {
        margin-top: 20px;
    }

    &__button {
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: rgb(120, 226, 230);
        padding: 5px;
        margin-left: 20px;
        transition: background-color 0.3s;

        &:hover {
            background-color: rgb(144, 226, 229);
            transition: background-color 0.3s;
        }
    }
}
</style>
