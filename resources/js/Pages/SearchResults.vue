<template>
    <MainLayout :user="user">
        <div class="container">
            <h1>Результаты поиска</h1>
            <SerialsOnMain :serials="serials" />
            <div class="wrapper">
                <span>
                    Не нашли то, что искали? Перейдите на
                    <a href="/addSerial">эту страницу</a>
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
    },
};
</script>

<style scoped>
.container {
    background-color: rgb(239, 231, 231);
}

h1 {
    padding-left: 30px;
    margin-top: 30px;
    margin-bottom: 0;
}

.wrapper {
    padding-left: 30px;
    margin-top: 30px;
    margin-bottom: 40px;
}

a {
    color: black;
}
</style>
