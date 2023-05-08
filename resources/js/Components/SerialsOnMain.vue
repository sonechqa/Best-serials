<template>
    <div class="container">
        <div class="serials" v-for="serial in serials" :key="serial.id">
            <img src="" alt="Постер фильма" />
            <h3>{{ serial.Name }}</h3>
            <div v-for="(country, index) in serial.countries" :key="country.id">
                {{ country.Name
                }}<span v-if="index != serial.countries.length - 1">,</span>
            </div>
            <p>{{ serial.ReleaseYears }}</p>
            <p>{{ serial.Directors }}</p>
            <div v-for="(genre, index) in serial.genres" :key="genre.id">
                {{ genre.Name
                }}<span v-if="index != serial.genres.length - 1">,</span>
            </div>
            <p>{{ serial.Rating }}</p>
        </div>
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

<style scoped></style>
