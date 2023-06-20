<template>
    <div class="serialsOnMain" v-for="serial in serials" :key="serial.id">
        <img
            :src="'/' + serial.Poster"
            alt="Постер сериала"
            class="serialsOnMain__img"
        />
        <div class="serialsOnMain__properties">
            <a :href="'/serials/' + serial.id">
                <h3 class="serialsOnMain__name">{{ serial.Name }}</h3>
            </a>
            <div class="serialsOnMain__countries">
                <div
                    v-for="(country, index) in serial.countries"
                    :key="country.id"
                >
                    {{ country.Name
                    }}<span
                        class="serialsOnMain__text"
                        v-if="index != serial.countries.length - 1"
                        >,&nbsp;
                    </span>
                </div>
            </div>
            <p class="serialsOnMain__years">{{ serial.ReleaseYears }}</p>
            <p>
                <span class="serialsOnMain__text">Режиссёры:&nbsp;</span
                >{{ serial.Directors }}
            </p>
            <div class="serialsOnMain__genres">
                <span class="serialsOnMain__text">Жанры:&nbsp;</span>
                <div v-for="(genre, index) in serial.genres" :key="genre.id">
                    {{ genre.Name
                    }}<span
                        class="serialsOnMain__text"
                        v-if="index != serial.genres.length - 1"
                        >,&nbsp;
                    </span>
                </div>
            </div>
        </div>
        <p
            class="serialsOnMain__rating"
            v-bind:class="{
                serialsOnMain__greenRating: serial.avg_rating >= 7,
                serialsOnMain__redRating: serial.avg_rating < 7,
            }"
        >
            {{ serial.avg_rating }}
        </p>
    </div>
</template>

<script>
export default {
    name: "SerialsOnMain",
    props: {
        serials: Array,
    },
};
</script>

<style scoped lang="scss">
.serialsOnMain {
    display: flex;
    border-bottom: 1px inset black;
    padding-top: 40px;
    padding-bottom: 40px;
    padding-left: 30px;

    &:last-child {
        border-bottom: none;
    }

    &__img {
        width: 150px;
        height: 220px;
    }

    &__properties {
        display: flex;
        flex-direction: column;
        margin-left: 30px;
        justify-content: center;
    }

    &__name {
        margin-top: 0;
        color: black;
    }

    &__countries,
    &__genres {
        display: flex;
    }

    &__text {
        font-weight: 700;
    }

    &__years {
        margin-bottom: 0;
    }

    &__rating {
        color: white;
        width: 50px;
        height: min-content;
        text-align: center;
        margin-left: auto;
        margin-right: 30px;
    }

    &__greenRating {
        background-color: rgb(4, 150, 4);
    }

    &__redRating {
        background-color: red;
    }
}
</style>
