<template>
    <div class="serials" v-for="serial in serials" :key="serial.id">
        <img :src="serial.Poster" alt="Постер фильма" />
        <div class="properties">
            <h3>{{ serial.Name }}</h3>
            <div class="countries">
                <div
                    v-for="(country, index) in serial.countries"
                    :key="country.id"
                >
                    {{ country.Name
                    }}<span v-if="index != serial.countries.length - 1"
                        >,&nbsp;</span
                    >
                </div>
            </div>
            <p class="years">{{ serial.ReleaseYears }}</p>
            <p><span>Режиссёры:&nbsp;</span>{{ serial.Directors }}</p>
            <div class="genres">
                <span>Жанры:&nbsp;</span>
                <div v-for="(genre, index) in serial.genres" :key="genre.id">
                    {{ genre.Name
                    }}<span v-if="index != serial.genres.length - 1"
                        >,&nbsp;
                    </span>
                </div>
            </div>
        </div>
        <p
            class="rating"
            v-bind:class="{
                green_rating: serial.Rating >= 7,
                red_rating: serial.Rating < 7,
            }"
        >
            {{ serial.Rating }}
        </p>
    </div>
</template>

<script>
export default {
    name: "SerialsOnMain",
    props: {
        serials: Array,
        genres: Array,
        countries: Array,
    },
};
</script>

<style scoped>
.serials {
    display: flex;
    border-bottom: 1px inset black;
    padding-top: 40px;
    padding-bottom: 40px;
    padding-left: 30px;
}

img {
    width: 160px;
    height: 220px;
}

.properties {
    display: flex;
    flex-direction: column;
    margin-left: 30px;
    justify-content: center;
}

h3 {
    margin-top: 0;
}

.countries {
    display: flex;
}

.years {
    margin-bottom: 0;
}

span {
    font-weight: 700;
}

.genres {
    display: flex;
}

.rating {
    color: white;
    width: 50px;
    height: min-content;
    text-align: center;
    margin-left: auto;
    margin-right: 30px;
}

.green_rating {
    background-color: green;
}

.red_rating {
    background-color: red;
}
</style>
