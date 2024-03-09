<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from '@/Components/TextInput.vue';
import InputError from "@/Components/InputError.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import { useForm } from '@inertiajs/vue3';
import FileInput from "@/Components/FileInput.vue";

const form = useForm({
    name: '',
    description: ''
});
</script>

<template>
    <Head title="Добавить модель" />

    <Layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('add.model'))" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Название" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="description" value="Описание" />

                            <TextAreaInput
                                id="description"
                                class="h-20 mt-1 block w-full"
                                v-model="form.description"
                                required
                                autofocus
                            />

                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div>
                            <InputLabel for="files" value="Загрузить файлы" />

                            <FileInput
                                id="files"
                                accept="image/png, image/jpeg, .stl"
                                multiple
                                required
                            />
<!--                            <InputError class="mt-2" :message="form.errors.description" />-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Layout>
</template>