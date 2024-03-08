<script setup>
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <AuthenticatedLayout v-if="$page.props.auth.user">
        <slot/>
    </AuthenticatedLayout>
    <GuestLayout v-else>
        <slot/>
    </GuestLayout>
</template>