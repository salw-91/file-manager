<template>
    <modal :show="modelValue" @show="onShow" max-width="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Create New Folder</h2>
            <div class="mt-6">
                
                <InputLabel for="forderName" value="Folder Name" class="sr-only"/>
                <TextInput  type="text" 
                            ref="forlderNameInput"
                            id="folderName"
                            v-model="form.name"
                            class="mt-1 black w-full" 
                            :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' "
                            placeholder="Folder Name"
                            @keyup.enter="createFolder"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    @click="createFolder"
                    :disable="form.procssing"
                >
                    Create
                </PrimaryButton>
            </div>
        </div>
    </modal>
</template>

<script setup>
import Modal from "@/Components/Modal.vue";
import InputLabel from "../InputLabel.vue";
import TextInput from "../TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "../PrimaryButton.vue";
import {nextTick, ref} from "vue";

const form = useForm({
    name: "",
});

const emit = defineEmits(["update:modelValue"]);

const forlderNameInput = ref(null)

function onShow(){
    nextTick(()=> forlderNameInput.value.focus() )
    
}

const {modelValue} = defineProps({
    modelValue: Boolean
})

function closeModal(){
    emit ('update:modelValue')
    form.clearErrors();
    form.reset()
}

function createFolder() {
    form.post(route('folder.create'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            form.reset()
            forlderNameInput.value = ''
        },
        onError: () => forlderNameInput.value.focus()
    })
}

</script>
