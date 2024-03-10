<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <input
        class="focus:border-blue-200 dark:focus:border-blue-600 focus:ring-blue-200 dark:focus:ring-blue-600"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        type="file"
        ref="input"
    />
</template>
