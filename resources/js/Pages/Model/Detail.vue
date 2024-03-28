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

const viewFileSize = (fileSize) => {
    let sizeUnit = 'Кб';
    fileSize = fileSize / 1024;

    if (fileSize > 1024) {
        fileSize = fileSize / 1024;
        sizeUnit = 'Mб';
    }

    return Math.round( fileSize * 100 ) / 100 + '&nbsp;' + sizeUnit;
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
                    <div v-if="activeTab === tabsCodes.FILES" class="mt-12">
                        <div
                            v-for="modelFile in thingModel.data.modelFiles"
                            class="mt-2.5 mb-2.5 block w-full rounded-lg shadow bg-white text-left text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                            <div class="p-6 flex">
                                <div class="mr-10">
                                    ⚙️
                                </div>
                                <div class="flex mr-5">
                                    <div class="text-base">
                                        {{ modelFile.file.name }}
                                    </div>
                                    <div class="italic text-gray-400 ml-7" v-html="viewFileSize(modelFile.file.size)"></div>
                                </div>
                                <a
                                    :href="route('model.download', {'id': modelFile.file.id})"
                                    class="text-base font-bold text-blue-500 hover:text-blue-300 ml-auto"
                                    download
                                >
                                    Скачать
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>