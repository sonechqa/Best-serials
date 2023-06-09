<template class="oneFolder">
    <MainLayout :user="user" :folders="folders">
        <AllSerials
            :serials="serials"
            :genres="genres"
            :countries="countries"
            :selectedGenres="selectedGenres"
            :selectedCountries="selectedCountries"
            :pagePath="'/folders/' + folder.id"
        >
            <div class="oneFolder__folders">
                <p class="oneFolder__title">Папки:</p>
                <a
                    v-for="folder in folders"
                    :key="folder.id"
                    :href="'/folders/' + folder.id"
                    class="oneFolder__folder"
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
.oneFolder {
    &__folders {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    &__title {
        font-weight: 700;
        margin-top: 0;
    }

    &__folder {
        text-decoration: none;
        color: black;

        &:not(:last-child) {
            margin-bottom: 5px;
        }
    }
}
</style>
