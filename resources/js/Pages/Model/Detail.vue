<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import Tabs from "@/Components/Tabs/Tabs.vue";
import Galleria from "primevue/galleria";

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
        <div class="md:py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <Galleria
                    :value="thingModel.data.modelImageFiles"
                    :numVisible="5"
                    :circular="true"
                    containerStyle="max-width: 1216px"
                    :showThumbnailNavigators="thingModel.data.modelImageFiles.length > 5"
                    :showItemNavigators="true"
                    :showItemNavigatorsOnHover="true"
                >
                    <template #item="slotProps">
                        <img :src="slotProps.item.file.path" :alt="slotProps.item.file.name" class="max-w-full max-h-[450px] block cover" />
                    </template>
                    <template #thumbnail="slotProps">
                        <img :src="slotProps.item.file.path" :alt="slotProps.item.file.name" class="max-w-14 max-h-14 block" />
                    </template>
                </Galleria>
                <div class="p-4 sm:p-8">
                    <div class="text-4xl font-bold">{{ thingModel.data.name }}</div>
                    <Tabs
                        :activeTab="activeTab"
                        :tabs="tabs"
                        :changeTab="changeTab"
                    />
                    <div
                        v-if="activeTab === tabsCodes.DESCRIPTION"
                        class="p-8"
                    >
                        <pre>{{ thingModel.data.description }}</pre>
                    </div>
                    <div v-if="activeTab === tabsCodes.FILES" class="mt-12 flex flex-col">
                        <a
                            :href="route('model.download.all', {'modelId': thingModel.data.id})"
                            class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            download
                        >
                            Скачать всё .zip
                        </a>
                        <div
                            v-for="modelFile in thingModel.data.modelDetailFiles"
                            class="mt-2.5 mb-2.5 block w-full rounded-lg shadow bg-white text-left text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                            <div class="p-6 flex flex-wrap sm:flex-nowrap">
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