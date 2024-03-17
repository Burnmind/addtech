<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-16 relative">
            <Link
                :href="route('main')"
                class="shrink-0 flex items-center text-gray-900 font-bold sm:text-3xl text-lg dark:text-white"
            >
                АДДИТИВ
            </Link>
            <div class="shrink-0 flex items-center h-16 absolute right-0">
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-200"
                >
                    Войти
                </Link>
                <Link
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-200"
                >
                    Регистрация
                </Link>
            </div>
        </div>
    </div>
</template>
