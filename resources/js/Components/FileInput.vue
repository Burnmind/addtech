<script setup>
import {ref, watch} from "vue";
import {DialogButton, Dropzone, FileSelector} from 'vue3-file-selector/src';
import {last, split} from "lodash";

defineProps({
    accept: {
        type: Array,
        default: []
    }
});

const model = defineModel();
const files = ref([]);
const previews = ref([]);

const toBlob = async (file, index) => {
    const type = last(split(file.name, '.'));

    const fileData = {
        index,
        icon: '',
        image: '',
        name: file.name
    };

    if (type === 'stl') {
        fileData.icon = '⚙';
    } else {
        const buffer = await file.arrayBuffer()
        const blob = new Blob([buffer])
        fileData.image = URL.createObjectURL(blob)
    }

    return fileData;
}

watch(() => [...files.value], async () => {
    previews.value = await Promise.all(
        files.value.map((file, index) => toBlob(file, index))
    );

    model.value = files.value;
});

const removeFile = (index) => {
    files.value.splice(index, 1);
}
</script>

<template>
    <FileSelector v-model="files" :accept="accept">
        <Dropzone v-slot="{ hovered }">
            <div
                class="flex items-center flex-col transition min-h-48 p-14"
                :class="{
                    'bg-blue-200/20': !hovered,
                    'bg-blue-200': hovered
                }"
            >
                <DialogButton
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                >
                    + Добавить файлы
                </DialogButton>
                <div class="text-lg text-gray-700 font-bold mt-8">
                    Нажми на кнопку или перетащи файлы в зону.
                </div>
                <div class="flex justify-center flex-wrap -m-3 mt-12">
                    <div class="flex items-center flex-col w-32 m-3 overflow-hidden" v-for="preview in previews">
                        <div class="flex justify-center items-center text-6xl w-28 h-28 relative">
                            <div
                                @click="removeFile(preview.index)"
                                class="absolute top-1 right-1 text-white text-xl leading-none cursor-pointer rounded-full bg-gray-900/30 w-5 h-5 flex justify-center items-center">
                                <div class="cross"></div>
                            </div>
                            <img
                                v-if="preview.image"
                                :key="preview.image"
                                :src="preview.image"
                                :alt="preview.name"
                                class="max-h-full"
                            />
                            <template v-else>
                                {{ preview.icon }}
                            </template>
                        </div>
                        <div class="text-xs text-gray-700 w-full">{{ preview.name }}</div>
                    </div>
                </div>
            </div>
        </Dropzone>
    </FileSelector>
</template>

<style>
.cross:before {
    content: '';
    position: absolute;
    display: block;
    transform: translate(-50%, -50%);
    height: 12px;
    width: 2px;
    background: white;
}

.cross:after {
    content: '';
    position: absolute;
    display: block;
    transform: translate(-50%, -50%);
    height: 2px;
    width: 12px;
    background: white;
}

.cross {
    position: relative;
    transform: rotate(45deg);
}
</style>