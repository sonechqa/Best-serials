<template>
    <div class="container">
        <div class="wrapper">
            <ul class="tags">
                <li
                    class="tag"
                    v-for="(selectedGenre, index) in selectedGenres"
                    :key="selectedGenre"
                >
                    <div class="genreName">{{ selectedGenre.Name }}</div>
                    <div class="deleteGenre" @click="() => deleteGenre(index)">
                        <img
                            src="../../images/close.png"
                            alt="Крестик для удаления"
                            class="cross"
                        />
                    </div>
                </li>
                <li class="addGenre">
                    <input
                        type="string"
                        class="type"
                        v-model="inputValue"
                        @focus="showVariants"
                        @blur="hideVariants"
                        @input="getSuggestedGenres"
                    />
                </li>
            </ul>
        </div>
        <div
            class="selectGenre"
            v-show="variantsVisibility && suggestedGenres.length > 0"
        >
            <ul class="variants">
                <li
                    class="variant"
                    v-for="suggestedGenre in suggestedGenres"
                    :key="suggestedGenre.id"
                    @click="() => selectGenre(suggestedGenre)"
                >
                    {{ suggestedGenre.Name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SelectGenres",
    data() {
        return {
            inputValue: "",
            suggestedGenres: [],
            variantsVisibility: false,
            selectedGenres: this.modelValue,
        };
    },
    props: {
        modelValue: Array,
    },
    emits: ["update:modelValue"],
    methods: {
        showVariants() {
            this.variantsVisibility = true;
        },
        hideVariants() {
            setTimeout(() => {
                this.variantsVisibility = false;
            }, 50);
        },
        getSuggestedGenres() {
            axios
                .post("/genres", {
                    input: this.inputValue,
                })
                .then((res) => {
                    this.suggestedGenres = res.data;
                    if (this.inputValue === "") {
                        this.suggestedGenres = [];
                    }
                });
        },
        selectGenre(suggestedGenre) {
            this.selectedGenres.push(suggestedGenre);
            this.$emit("update:modelValue", this.selectedGenres);
        },
        deleteGenre(index) {
            this.selectedGenres.splice(index, 1);
        },
    },
};
</script>

<style>
.wrapper {
    position: relative;
    width: min-content;
    margin-bottom: 0;
}

.tags {
    padding-left: 0;
    margin-top: 0;
    margin-bottom: 0;
    display: flex;
}

li {
    list-style-type: none;
}

.tag {
    display: flex;
    width: min-content;
    background-color: yellow;
    margin-right: 5px;
    padding: 3px;
}

.genreName {
    margin-right: 5px;
}

.deleteGenre {
    cursor: pointer;
}

.cross {
    width: 8px;
    height: 8px;
}

.selectGenre {
    border-left: 1px solid black;
    border-bottom: 1px solid black;
    border-right: 1px solid black;
    background-color: white;
}

.variants {
    padding-left: 5px;
    margin-top: 0;
    margin-bottom: 0;
}

.variant {
    cursor: pointer;
}
</style>
