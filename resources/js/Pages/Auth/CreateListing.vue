<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed, ref} from "vue";
const form = useForm({
    title: null,
    description: null,
    category_id:null,
    price: 1
});

const images = ref('');

/*const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};*/

const submit = () => {
    form.post('/test')
};

const categories = computed(()=> usePage().props.categories);

</script>

<template>
    <AuthenticatedLayout>
        <GuestLayout class="w-full bg-white">
        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col space-y-6" enctype="multipart/form-data">
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Name your property"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="description" value="Description"></InputLabel>
                <textarea required v-model="form.description" name="description" placeholder="Describe your property" class="w-full mt-1 rounded-lg border border-gray-300"></textarea>
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

<!--
            <div>
                <InputLabel for="images" value="Upload your images"></InputLabel>
                <input class="py-2 px-1 w-full border border-gray-300 rounded-lg mt-1" type="file" name="images" id="images">
                <InputError class="mt-2" :message="form.errors.images" />
            </div>
-->

            <div>
                <InputLabel for="category" value="Choose category:"></InputLabel>
                <select v-model="form.category_id" class="w-full rounded-lg border border-gray-300 mt-1" name="category" id="category">
                    <option disabled selected>Choose category</option>
                    <option :value="category.id" v-for="category in categories" v-html="category.name" >
                    </option>
                </select>
                <InputError class="mt-2" :message="form.errors.category_id" />
            </div>

            <div>
                <p class="text-gray-600 text-sm">{{form.price}}$ Per night</p>
                <input v-model="form.price" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" type="range" name="price" id="" min="1" max="5000">
                <InputError class="mt-2" :message="form.errors.price" />
            </div>






            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Upload
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>


    </AuthenticatedLayout>
</template>

