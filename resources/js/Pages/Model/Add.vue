<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from '@/Components/TextInput.vue';
import InputError from "@/Components/InputError.vue";
import ItemInputError from "@/Components/ItemInputError.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FileInput from "@/Components/FileInput.vue";

const form = useForm({
    name: '',
    description: '',
    files: null
});

const submit = () => {
    form.post(
        route('model.create'),
        {
            forceFormData: true
        }
    );
}
</script>

<template>
    <Head title="Добавить модель" />

    <Layout>
        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form @submit.prevent="" class="mt-6 space-y-6">
                        <div>
                            <FileInput
                                id="files"
                                :accept="['image/png', 'image/jpeg', '.stl']"
                                v-model="form.files"
                            />

                            <InputError class="mt-2" :message="form.errors.files" />
                            <ItemInputError class="mt-2" :messages="form.errors" field="files" />
                        </div>
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

                        <div class="flex justify-end items-center gap-4">
                            <PrimaryButton @click="submit" :disabled="form.processing">Добавить</PrimaryButton>

                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Добавлено!</p>
                            </Transition>
                        </div>
                    </form>
                </div>
        </div>
    </Layout>
</template>