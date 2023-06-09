<template>
    <div class="selectCountries">
        <div class="selectCountries__wrapper">
            <ul class="selectCountries__tags">
                <li
                    class="selectCountries__tag selectCountries__li"
                    v-for="(selectedCountry, index) in selectedCountries"
                    :key="selectedCountry"
                >
                    <div class="selectCountries__countryName">
                        {{ selectedCountry.Name }}
                    </div>
                    <div
                        class="selectCountries__deleteCountry"
                        @click="() => deleteCountry(index)"
                    >
                        <img
                            src="../../../images/close.png"
                            alt="Крестик для удаления"
                            class="selectCountries__cross"
                        />
                    </div>
                </li>
                <li class="selectCountries__li">
                    <input
                        type="string"
                        v-model="inputValue"
                        @focus="showVariants"
                        @blur="hideVariants"
                        @input="getSuggestedCountries"
                    />
                </li>
            </ul>
        </div>
        <div
            class="selectCountries__selectCountry"
            v-show="variantsVisibility && suggestedCountries.length > 0"
        >
            <ul class="selectCountries__variants">
                <li
                    class="selectCountries__variant selectCountries__li"
                    v-for="suggestedCountry in suggestedCountries"
                    :key="suggestedCountry.id"
                    @click="() => selectCountry(suggestedCountry)"
                >
                    {{ suggestedCountry.Name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SelectCountries",
    data() {
        return {
            inputValue: "",
            suggestedCountries: [],
            variantsVisibility: false,
            selectedCountries: this.modelValue,
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
        getSuggestedCountries() {
            axios
                .post("/countries", {
                    input: this.inputValue,
                })
                .then((res) => {
                    this.suggestedCountries = res.data;
                    if (this.inputValue === "") {
                        this.suggestedCountries = [];
                    }
                });
        },
        selectCountry(suggestedCountry) {
            this.selectedCountries.push(suggestedCountry);
            this.$emit("update:modelValue", this.selectedCountries);
        },
        deleteCountry(index) {
            this.selectedCountries.splice(index, 1);
        },
    },
};
</script>

<style scoped lang="scss">
.selectCountries {
    &__wrapper {
        position: relative;
        width: min-content;
        margin-bottom: 0;
    }

    &__tags {
        padding-left: 5px;
        margin-top: 0;
        margin-bottom: 0;
        display: flex;
    }

    &__tag {
        width: min-content;
        background-color: yellow;
        margin-right: 5px;
        padding: 3px;
        display: flex;
    }

    &__li {
        list-style-type: none;
    }

    &__countryName {
        margin-right: 5px;
    }

    &__deleteCountry {
        cursor: pointer;
    }

    &__cross {
        width: 8px;
        height: 8px;
    }

    &__selectCountry {
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
