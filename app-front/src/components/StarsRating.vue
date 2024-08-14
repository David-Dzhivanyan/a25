<template>
<div :class="$style.root" :data-value="JSON.stringify(inputData)">
    <label :class="$style.label" v-for="idx in 5">
        <svg :class="$style.svgWrapper" xmlns="http://www.w3.org/2000/svg" width="1024" height="1024" viewBox="0 0 1024 1024">
            <path :class="$style.svg" fill="#000" d="M482.040 150.79c9.431-30.386 50.488-30.386 59.919 0l69.053 222.517c4.219 13.588 16.312 22.789 29.96 22.789h223.465c30.518 0 43.205 40.886 18.516 59.666l-180.787 137.523c-11.041 8.399-15.66 23.286-11.443 36.874l69.053 222.518c9.431 30.387-23.788 55.654-48.474 36.874l-180.787-137.523c-11.041-8.399-25.992-8.399-37.033 0l-180.787 137.523c-24.686 18.78-57.904-6.487-48.474-36.874l69.053-222.518c4.216-13.588-0.402-28.475-11.443-36.874l-180.787-137.523c-24.688-18.78-12-59.666 18.516-59.666h223.466c13.647 0 25.741-9.201 29.96-22.789l69.053-222.517z"></path>
        </svg>
        <input
            :class="$style.input"
            :value="idx"
            :name="props.name"
            type="radio"
            v-model="inputData"
        >
    </label>
</div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
const props = defineProps({
    name: { type: String, default: 'rating-star' },
    modelValue: { type: Number, default: 0 }
});
const emit = defineEmits(['update:modelValue'])


const inputData = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

</script>

<style lang="scss" module>
.root {
    display: inline;

    &.disabled { pointer-events: none }

    &:hover {
        .label:hover ~ .label {
            .svg { fill: black }
        }

        .svg { fill: #50B792 }
    }
}

.label {
    position: relative;
    z-index: 1;
    cursor: pointer;
    color: inherit;
    font-size: 1em;

    @for $i from 1 through 5 {
        .root[data-value="#{$i}"] &:nth-child(-n + #{$i}) {
            .svg { fill: #50B792 }
        }
    }

    &:has(.input:focus) {
        .svg { fill: #50B792 }
    }
}

.svgWrapper {
    display: inline;
    width: 30px;
    height: 30px;
}

.input {
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 0;
    opacity: 0;
    pointer-events: none;
}
</style>
