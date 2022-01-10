<template>
    <select v-model="selected">
    <option disabled value="">Choisissez</option>
    <option>A</option>
    <option>B</option>
    <option>C</option>
    </select>
    <span>Sélectionné : {{ selected }}</span>
</template>

<script>
import BreezeInputError from '@/Components/InputError.vue'

export default {
    components: {
        BreezeInputError,
    },

    props: ['modelValue', 'inputId', 'labelText'],

    emits: ['update:modelValue'],
}
</script>
