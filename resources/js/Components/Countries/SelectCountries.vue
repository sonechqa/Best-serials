<template>
    <div class="cont">
        <div class="wrap">
            <ul class="tags">
                <li
                    class="tag"
                    v-for="(selectedCountry, index) in selectedCountries"
                    :key="selectedCountry"
                >
                    <div class="countryName">{{ selectedCountry.Name }}</div>
                    <div
                        class="deleteCountry"
                        @click="() => deleteCountry(index)"
                    >
                        <img
                            src="../../../images/close.png"
                            alt="Крестик для удаления"
                            class="cross"
                        />
                    </div>
                </li>
                <li class="addCountry">
                    <input
                        type="string"
                        class="type"
                        v-model="inputValue"
                        @focus="showVariants"
                        @blur="hideVariants"
                        @input="getSuggestedCountries"
                    />
                </li>
            </ul>
        </div>
        <div
            class="selectCountry"
            v-show="variantsVisibility && suggestedCountries.length > 0"
        >
            <ul class="vars">
                <li
                    class="var"
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

<style>
.wrap {
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

.countryName {
    margin-right: 5px;
}

.deleteCountry {
    cursor: pointer;
}

.cross {
    width: 8px;
    height: 8px;
}

.selectCountry {
    border-left: 1px solid black;
    border-bottom: 1px solid black;
    border-right: 1px solid black;
    background-color: white;
}

.vars {
    padding-left: 5px;
    margin-top: 0;
    margin-bottom: 0;
}

.var {
    cursor: pointer;
}
</style>
