<template class="serialRating">
    <star-rating
        :rating="avgRating"
        :max-rating="10"
        :round-start-rating="false"
        :increment="0.5"
        :clearable="true"
        :animate="true"
        :inline="true"
        :star-size="40"
        @update:rating="myRating.rating = $event"
    >
    </star-rating>
    <div v-show="myRating.rating > 0" class="serialRating__userRating">
        Моя оценка: {{ myRating.rating }}
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
        serialId: Number,
        avgRating: Number,
        userRating: Number,
    },
    data() {
        return {
            serialRating: this.avgRating,
            myRating: this.userRating,
        };
    },
    methods: {
        saveRating() {
            router.post("/rating", {
                rating: this.myRating.rating,
                serialId: this.serialId,
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
