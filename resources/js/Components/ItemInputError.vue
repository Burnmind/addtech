<script setup>
import {ref, watch} from "vue";

const props = defineProps({
    messages: {
        type: Object,
        default: {}
    },
    field: {
        type: String,
        default: ''
    }
});
const messagesKeys = ref([]);

watch(() => props.messages, () => {
    messagesKeys.value = Object.keys(props.messages).filter((item) => {
        return item.includes(props.field) && item !== props.field;
    });
}, {deep: true})
</script>

<template>
    <div v-for="key in messagesKeys">
        <p class="text-sm text-red-600 dark:text-red-400">
            {{ messages[key] }}
        </p>
    </div>
</template>
