<script setup>
defineProps({
    tab: {
        type: {},
        default: {}
    },
    active: {
        type: Boolean,
        default: false
    },
    disabled: {
        type: Boolean,
        default: false
    },
});
</script>

<template>
    <li v-if="active" class="me-2">
        <a
            class="text-lg font-bold inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 cursor-default"
            aria-current="page"
        >
            {{ tab.name }}
        </a>
    </li>
    <li v-else class="me-2">
        <a
            class="text-lg font-bold inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 cursor-pointer"
        >
            {{ tab.name }}
        </a>
    </li>
</template>
