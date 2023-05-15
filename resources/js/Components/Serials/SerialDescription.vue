<template>
    <div class="container">
        <div class="wrapper">
            <img :src="serial.Poster" alt="Постер сериала" class="poster" />
            <div class="properties">
                <h1>{{ serial.Name }}</h1>
                <h3>О сериале</h3>
                <p class="years">Год выхода: {{ serial.ReleaseYears }}</p>
                <div class="countries">
                    <span>Страна:&nbsp;</span>
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
                <div class="genres">
                    <span>Жанры:&nbsp;</span>
                    <div
                        v-for="(genre, index) in serial.genres"
                        :key="genre.id"
                    >
                        {{ genre.Name
                        }}<span v-if="index != serial.genres.length - 1"
                            >,&nbsp;
                        </span>
                    </div>
                </div>
                <p class="directors">Режиссёры: {{ serial.Directors }}</p>
            </div>
            <span
                class="rating"
                v-bind:class="{
                    green: serial.Rating >= 7,
                    red: serial.Rating < 7,
                }"
                >{{ serial.Rating }}</span
            >
        </div>
        <div class="description">
            <h3>Описание сериала</h3>
            <div>{{ serial.Description }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SerialDescription",
    props: {
        serial: Array,
    },
};
</script>

<style scoped>
.container {
    width: 1000px;
    margin: auto;
    margin-top: 50px;
    background-color: white;
    padding: 50px;
    border: 1px solid black;
    box-shadow: 0px 0px 25px 13px rgb(50, 49, 49);
}

.wrapper {
    display: flex;
    border-bottom: 1px inset black;
    padding-bottom: 50px;
}

.poster {
    width: 300px;
    height: 450px;
    margin-right: 30px;
}

h1 {
    margin-top: 0;
}

.countries {
    display: flex;
    margin-bottom: 16px;
}

.genres {
    display: flex;
}

.rating {
    font-size: 20px;
    width: 50px;
    height: min-content;
    text-align: center;
    margin-left: auto;
    margin-right: 30px;
}

.rating.green {
    color: rgb(4, 150, 4);
}

.rating.red {
    color: red;
}

.description {
    width: 700px;
    line-height: 25px;
}
</style>
