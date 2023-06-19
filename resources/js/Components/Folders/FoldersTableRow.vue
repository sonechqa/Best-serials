<template>
    <tr class="foldersTableRow">
        <td class="foldersTableRow__td">
            <input
                type="text"
                class="foldersTableRow__name"
                v-model="newName"
            />
        </td>
        <div class="foldersTableRow__buttons">
            <button
                type="button"
                class="foldersTableRow__saveFolder"
                @click="saveFolder"
            >
                Сохранить
            </button>
            <button
                type="button"
                class="foldersTableRow__deleteFolder"
                @click="deleteFolder"
            >
                Удалить папку
            </button>
        </div>
    </tr>
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    name: "FoldersTableRow",
    props: {
        folder: Object,
    },
    data() {
        return {
            oldName: this.folder.Name,
            newName: this.folder.Name,
        };
    },
    methods: {
        saveFolder() {
            router.post("/updateFolder", {
                id: this.folder.id,
                oldName: this.oldName,
                newName: this.newName,
            });
        },
        deleteFolder() {
            router.post("/deleteFolder", {
                id: this.folder.id,
                Name: this.newName,
            });
        },
    },
};
</script>

<style scoped lang="scss">
.foldersTableRow {
    position: relative;

    &__td {
        padding: 3px;
        border: 1px solid black;
        text-align: center;
        height: 40px;
    }

    &__name {
        outline: none;
    }

    &__buttons {
        display: flex;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    &__saveFolder {
        margin-left: 10px;
        background-color: rgb(83, 184, 221);
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    &__deleteFolder {
        margin-left: 10px;
        padding: 0px 15px;
        background-color: rgb(58, 198, 62);
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
}
</style>
