<script setup>
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <AuthenticatedLayout v-if="$page.props.auth.user">
                    <slot/>
                </AuthenticatedLayout>
                <GuestLayout v-else>
                    <slot/>
                </GuestLayout>
            </nav>
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>