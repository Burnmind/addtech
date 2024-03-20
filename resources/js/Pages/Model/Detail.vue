<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import Tabs from "@/Components/Tabs/Tabs.vue";

const tabsCodes = {
    DESCRIPTION: 'description',
    FILES: 'files',
};

const tabs = [
    {
        name: 'Описание',
        code: tabsCodes.DESCRIPTION
    },
    {
        name: 'Файлы',
        code: tabsCodes.FILES
    }
];


const props = defineProps({
    thingModel: {
        type: {},
        default: {
            data: {}
        }
    },
    activeTab: {
        type: String,
        default: 'description'
    }
});


const changeTab = (code) => {
    props.activeTab = code;
};
</script>

<template>
    <Head :title="thingModel.data.name" />

    <Layout>
        <div class="py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="flex justify-center">
                    <img class="max-h-96 object-cover" :src="thingModel.data.modelFiles[0].file.path" :alt="thingModel.data.name">
                </div>
                <div class="p-4 sm:p-8">
                    <div class="text-6xl font-bold">{{ thingModel.data.name }}</div>
                    <Tabs
                        :activeTab="activeTab"
                        :tabs="tabs"
                        :changeTab="changeTab"
                    />
                    <div v-if="activeTab === tabsCodes.DESCRIPTION">{{ thingModel.data.description }}</div>
                    <div v-if="activeTab === tabsCodes.FILES">Файлы</div>
                </div>
            </div>
        </div>
    </Layout>
</template>