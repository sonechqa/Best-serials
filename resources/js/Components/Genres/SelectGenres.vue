<template>
    <div class="selectGenres">
        <div class="selectGenres__wrapper">
            <ul class="selectGenres__tags">
                <li
                    class="selectGenres__tag selectGenres__li"
                    v-for="(selectedGenre, index) in selectedGenres"
                    :key="selectedGenre"
                >
                    <div class="selectGenres__genreName">
                        {{ selectedGenre.Name }}
                    </div>
                    <div
                        class="selectGenres__deleteGenre"
                        @click="() => deleteGenre(index)"
                    >
                        <img
                            src="../../../images/close.png"
                            alt="Крестик для удаления"
                            class="selectGenres__cross"
                        />
                    </div>
                </li>
                <li class="selectGenres__li">
                    <input
                        type="string"
                        v-model="inputValue"
                        @focus="showVariants"
                        @blur="hideVariants"
                        @input="getSuggestedGenres"
                    />
                </li>
            </ul>
        </div>
        <div
            class="selectGenres__selectGenre"
            v-show="variantsVisibility && suggestedGenres.length > 0"
        >
            <ul class="selectGenres__variants">
                <li
                    class="selectGenres__variant selectGenres__li"
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

<style scoped lang="scss">
.selectGenres {
    &__wrapper {
        position: relative;
        width: min-content;
        margin-bottom: 0;
    }

    &__tags {
        padding-left: 0;
        margin-top: 0;
        margin-bottom: 0;
        display: flex;
    }

    &__tag {
        display: flex;
        width: min-content;
        background-color: yellow;
        margin-right: 5px;
        padding: 3px;
    }

    &__li {
        list-style-type: none;
    }

    &__genreName {
        margin-right: 5px;
    }

    &__deleteGenre {
        cursor: pointer;
    }

    &__cross {
        width: 8px;
        height: 8px;
    }

    &__selectGenre {
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        border-right: 1px solid black;
        background-color: white;
    }

    &__variants {
        padding-left: 5px;
        margin-top: 0;
        margin-bottom: 0;
    }

    &__variant {
        cursor: pointer;
    }
}
</style>
