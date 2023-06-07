<template>
    <MainLayout :user="user">
        <div class="container">
            <div class="folders">
                <a
                    v-for="folder in folders"
                    :key="folder.id"
                    :href="'/folders/' + folder.id"
                    class="folder"
                >
                    {{ folder.Name }}
                </a>
            </div>
            {{ serials }}
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    name: "WillWatch",
    components: {
        MainLayout,
    },
    props: {
        serials: Array,
        folders: Array,
        user: Object,
    },
};
</script>

<style scoped lang="scss">
.folders {
    display: flex;
    flex-direction: column;
}

.folder {
    text-decoration: none;
    color: black;
}
</style>
