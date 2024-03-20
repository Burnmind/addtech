<script setup>
import Tab from "@/Components/Tabs/Tab.vue";

const props = defineProps({
    tabs: {
        type: [],
        default: []
    },
    activeTab: {
        type: String,
        default: ''
    },
    changeTab: {
        type: Function,
        default: () => {}
    }
});
</script>

<template>
    <div class="mt-10 mb-2 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <Tab
                v-for="tab in tabs"
                :active="activeTab === tab.code"
                :tab="tab"
                @click="changeTab(tab.code)"
            />
        </ul>
    </div>
</template>
