<template class="searchResults">
    <MainLayout :user="user" :folders="folders">
        <div class="searchResults__container container">
            <h1 class="searchResults__title">Результаты поиска</h1>
            <SerialsOnMain :serials="serials" />
            <div class="searchResults__wrapper">
                <span>
                    Не нашли то, что искали? Перейдите на
                    <a href="/addSerial" class="searchResults__link"
                        >эту страницу</a
                    >
                    и добавьте сериал!
                </span>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import SerialsOnMain from "../Components/Serials/SerialsOnMain.vue";

export default {
    name: "SearchResults",
    components: {
        MainLayout,
        SerialsOnMain,
    },
    props: {
        serials: Array,
        user: Object,
        folders: Array,
    },
};
</script>

<style scoped lang="scss">
.searchResults {
    &__container {
        background-color: rgb(239, 231, 231);
    }

    &__title {
        padding-left: 30px;
        margin-top: 30px;
        margin-bottom: 0;
    }

    &__wrapper {
        padding-left: 30px;
        margin-top: 30px;
        margin-bottom: 40px;
    }

    &__link {
        color: black;
    }
}
</style>
