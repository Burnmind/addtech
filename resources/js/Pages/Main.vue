<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import { Link } from '@inertiajs/vue3';

defineProps({
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Модели" />
    <Layout>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">Тут будет список моделей</div>
        </div>
        <div class="fixed right-32 bottom-20">
            <Link
                :href="route('add.model')"
                class="flex justify-center items-center w-24 h-24 rounded-full bg-gray-900 hover:bg-gray-800 dark:hover:bg-gray-100 dark:hover:bg-white text-white dark:text-gray-900 text-3xl md:text-9xl"
            >
                +
            </Link>
        </div>
    </Layout>
</template>
