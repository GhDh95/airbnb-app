<script setup>
import ReservationForm from "@/Components/ReservationForm.vue";
const props= defineProps({
    listing: Object
})

console.log(props.listing.images[0].image_path);
</script>

<template>
    <div class="mx-auto max-w-7xl flex flex-col pt-10 px-5">
        <div class="border border-gray-300 rounded-lg mb-4 px-2 py-2">
            <p class="text-2xl">{{ listing.title }}</p>
            <p class="text-gray-600">listed by: {{ listing.owner.name }}</p>
        </div>

        <div class="w-full  rounded-lg flex flex-col md:flex-row space-y-1 md:space-y-0 space-x-1">
            <div class="md:w-3/5  h-72 bg-indigo-50 rounded-xl overflow-hidden flex">
                <img class="w-full self-center " :src="'/storage/' + listing.images[0].image_path" alt="">
            </div>
            <div class="grid grid-cols-2 md:w-2/5 rounded-xl gap-1 h-72 ">
                <div v-for="image in listing.images.slice(1)" class="col-span-1 bg-indigo-50 rounded-xl overflow-y-hidden">
                    <img class="h-full w-full" :src="'/storage/' + image.image_path" alt="">
                </div>

            </div>
        </div>

        <div class="w-full mt-3 border border-gray-300 rounded-lg py-2 px-2 mb-3">
            <p class="text-lg font-thin">Description:</p>
            <p class="text-md text-gray-600">{{listing.description}}</p>
        </div>

        <ReservationForm :listing_id="listing.id">

        </ReservationForm>
    </div>



</template>



