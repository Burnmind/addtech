<script setup>
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {ref} from "vue";

const showingNavigationDropdown = ref(false);
</script>
<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-16 relative">
            <Link
                :href="route('main')"
                class="shrink-0 flex items-center text-gray-900 font-bold sm:text-3xl text-2xl dark:text-white"
            >
                АДДИТИВ
            </Link>
            <div class="shrink-0 hidden sm:flex items-center h-16 absolute right-0">
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


            <div class="-mr-2 flex sm:hidden items-center sm:hidden shrink-0 h-16 absolute right-0">
                <button
                    @click="showingNavigationDropdown = !showingNavigationDropdown"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path
                            :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex': !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div
        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
        class="sm:hidden"
    >
        <div class="pt-1 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="space-y-1">
                <ResponsiveNavLink :href="route('login')">
                    Войти
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('register')">
                    Регистрация
                </ResponsiveNavLink>
            </div>
        </div>
    </div>
</template>
