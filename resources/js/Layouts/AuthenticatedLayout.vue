<template>
    <div class="h-screen bg-gray-50 flex w-full gap-4">
        <Navigation />

        <main @drop.prevent="handleDrop" @dragover.prevent="onDragOver" @dragleave.prevent="onDragLeave"
            class="flex flex-col flex-1 px-4 overflow-hidden">
            <div class="flex items-center justify-between w-full">
                <SearchForm />
                <UserSettingDropdown />
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>

import Navigation from '@/Components/app/Navigation.vue';
import SearchForm from '@/Components/app/SearchForm.vue';
import UserSettingDropdown from '@/Components/app/UserSettingDropdown.vue';
import { onMounted } from "vue";
import { emitter, FILE_UPLOAD_STARTED } from '@/event-bus.js';

const dragOver = ref(false)

function onDragOver() {
    dragOver.value = true
}

function onDragLeave() {
    dragOver.value = false
}

function handleDrop(ev) {
    dragOver.value = false;
    const files = ev.dataTransfer.files
    console.log(files);
    if (!files.length) {
        return
    }
}

function uploadFiles(files) {
    console.log(files);
}

onMounted(() => {
    emitter.on(FILE_UPLOAD_STARTED, uploadFiles)
})

</script>