<template>
    <MainLayout :user="user" :folders="folders">
        <AllSerials
            :serials="serials"
            :genres="genres"
            :countries="countries"
            :selectedGenres="selectedGenres"
            :selectedCountries="selectedCountries"
            :pagePath="'/folders/' + folder.id"
        >
            <div class="folders">
                <p>Папки:</p>
                <a
                    v-for="folder in folders"
                    :key="folder.id"
                    :href="'/folders/' + folder.id"
                    class="folder"
                >
                    {{ folder.Name }}
                </a>
            </div>
        </AllSerials>
    </MainLayout>
</template>

<script>
import AllSerials from "../Components/Serials/AllSerials.vue";
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    name: "OneFolder",
    components: {
        MainLayout,
        AllSerials,
    },
    props: {
        serials: Array,
        folders: Array,
        folder: Object,
        user: Object,
        genres: Array,
        countries: Array,
        selectedGenres: Array,
        selectedCountries: Array,
    },
};
</script>

<style scoped lang="scss">
.folders {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

p {
    font-weight: 700;
    margin-top: 0;
}

.folder {
    text-decoration: none;
    color: black;

    &:not(:last-child) {
        margin-bottom: 5px;
    }
}
</style>
