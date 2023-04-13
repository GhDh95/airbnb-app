<script setup>
import ReservationForm from "@/Components/ReservationForm.vue";

const props= defineProps({
    listing: Object
})

console.log(props.listing.images[0].image_path);
</script>

<template>
    <div class="mx-auto max-w-7xl flex flex-col pt-10 px-5">
        <div class=" ">
            <p class="text-2xl">{{ listing.title }}</p>
            <p class="text-gray-600">listed by: {{ listing.owner.name }}</p>
        </div>

        <div class="w-full  rounded-lg flex flex-col md:flex-row space-y-1 md:space-y-0 space-x-1">
            <div class="md:w-3/5  h-72 bg-indigo-50 rounded-xl overflow-hidden flex">
                <img class="w-full self-center " :src="'/storage/' + listing.images[0].image_path" alt="">
            </div>
            <div class="grid grid-cols-2 md:w-2/5 rounded-xl gap-1 h-72 ">
                <div v-for="image in listing.images.slice(1)" class="col-span-1 bg-indigo-50 rounded-xl overflow-y-hidden">
                    <img class="h-fit w-full" :src="'/storage/' + image.image_path" alt="">
                </div>

            </div>
        </div>

        <div class="w-full mt-3 border border-gray-300 rounded-lg">
            <p>Description: <br> {{listing.description}}</p>
        </div>

        <ReservationForm>

        </ReservationForm>
    </div>



</template>



