<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { TailwindPagination } from 'laravel-vue-pagination';

defineProps({
    thingModelList: {}
});

const getImage = (thingModel) => {
    if (thingModel.model_files.length === 0) {
        return '';
    }

    return thingModel.model_files[0].file.path;
}

const changePage = (page) => {
    let url = route('main')
    url += page > 1 ? '?page=' + page : '';

    router.visit(url)
}

</script>

<template>
    <Head title="Модели" />
    <Layout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
            <a
                v-for="thingModel in thingModelList.data"
                :href="route('model.detail', {'id': thingModel.id})"
                class="bg-white rounded overflow-hidden transition-shadow shadow-lg hover:shadow-2xl cursor-pointer"
            >
                <img class="h-60 w-full object-cover" :src="getImage(thingModel)" :alt="thingModel.name">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ thingModel.name }}</div>
                </div>
            </a>
        </div>
        <div class="flex justify-center mt-2">
            <TailwindPagination
                :data="thingModelList"
                @pagination-change-page="changePage"
            />
        </div>
        <div class="fixed right-32 bottom-20">
            <Link
                :href="route('model.add')"
                class="flex justify-center items-center w-14 h-14 md:w-20 md:h-20 rounded-full bg-gray-900 hover:bg-gray-800 dark:hover:bg-gray-100 dark:hover:bg-white text-white dark:text-gray-900 text-6xl md:text-8xl"
            >
                +
            </Link>
        </div>
    </Layout>
</template>
