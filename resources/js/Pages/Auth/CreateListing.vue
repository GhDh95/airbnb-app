<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";

const form = useForm({
    title: null,
    description: null,
    category_id: null,
    images: null,
    street_name: null,
    houseN: null,
    zip:null,
    city:null,
    country:null,
    price: 1
});


/*const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};*/

const submit = () => {
    form.post('/listing/store')
};

const categories = computed(() => usePage().props.categories);

</script>

<template>
    <AuthenticatedLayout>
        <GuestLayout class="w-full bg-white">

            <form @submit.prevent="submit" class="flex flex-col space-y-6">
                <div>
                    <InputLabel for="title" value="Title"/>

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

                    <InputError class="mt-2" :message="form.errors.title"/>
                </div>

                <div>
                    <InputLabel for="description" value="Description"></InputLabel>
                    <textarea required v-model="form.description" name="description"
                              placeholder="Describe your property"
                              class="w-full mt-1 rounded-lg border border-gray-300"></textarea>
                    <InputError class="mt-2" :message="form.errors.description"/>
                </div>


                <div>
                    <InputLabel for="category" value="Choose category:"></InputLabel>
                    <select v-model="form.category_id" class="w-full rounded-lg border border-gray-300 mt-1"
                            name="category" id="category">
                        <option disabled selected>Choose category</option>
                        <option :value="category.id" v-for="category in categories" v-html="category.name">
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.category_id"/>
                </div>

                <!--       address inputs         -->
                <div>
                    <InputLabel for="street" value="street name"/>

                    <TextInput
                        id="street"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.street_name"
                        required
                        autofocus
                        autocomplete="street_name"
                        placeholder="your street"
                    />

                    <InputError class="mt-2" :message="form.errors.street_name"/>
                </div>
                <div>
                    <InputLabel for="house" value="house number"/>

                    <TextInput
                        id="house"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.houseN"
                        required
                        autofocus
                        autocomplete="houseN"
                        placeholder="House number"
                    />

                    <InputError class="mt-2" :message="form.errors.houseN"/>
                </div>

                <div>
                    <InputLabel for="zip" value="zip"/>

                    <TextInput
                        id="zip"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.zip"
                        required
                        autofocus
                        autocomplete="zip"
                        placeholder="zip"
                    />

                    <InputError class="mt-2" :message="form.errors.zip"/>
                </div>
                <div>
                    <InputLabel for="city" value="city"/>

                    <TextInput
                        id="city"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.city"
                        required
                        autofocus
                        autocomplete="city"
                        placeholder="city"
                    />

                    <InputError class="mt-2" :message="form.errors.city"/>
                </div>
                <div>
                    <InputLabel for="country" value="country"/>

                    <TextInput
                        id="country"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.country"
                        required
                        autofocus
                        autocomplete="country"
                        placeholder="country"
                    />

                    <InputError class="mt-2" :message="form.errors.country"/>
                </div>

                <!--                    -->

                <div>
                    <p class="text-gray-600 text-sm">{{ form.price }}$ Per night</p>
                    <input v-model="form.price"
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                           type="range" name="price" id="" min="1" max="5000">
                    <InputError class="mt-2" :message="form.errors.price"/>
                </div>
                <div>
                    <InputLabel for="images" value="Upload images"></InputLabel>
                    <input class="mt-1" type="file" @input="form.images = $event.target.files" name="images" id="image"
                           multiple>
                    <InputError class="mt-2" :message="form.errors.images"/>

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

