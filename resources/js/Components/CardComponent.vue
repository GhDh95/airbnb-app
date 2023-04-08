<template>


    <div  class=" relative px-2 md:px-0 w-fit flex flex-col justify-center max-w-md md:max-w-sm">
        <img class="rounded-lg" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">
        <div class="opacity-50 w-7 h-7 bg-white flex justify-center items-center rounded-full absolute right-2 md:right-1 top-1/3 ">
            <i class="fa-solid fa-chevron-right scale-75"></i>
        </div>
        <div class="opacity-50 w-7 h-7 bg-white flex justify-center items-center rounded-full absolute left-2 md:left-1 top-1/3 ">
            <i class="fa-solid fa-chevron-left scale-75"></i>
        </div>


        <Link :href="`/listing/${id}`" class="px-3">
            <p class="font-semibold text-xs max-h-4 overflow-hidden">{{ title }}</p>
            <p class="font-thin text-xs text-gray-600 max-h-4 overflow-hidden"> {{description}}</p>
            <p class="text-xs"> <span class="font-semibold">{{ price }}$</span> per night</p>
        </Link>
    </div>
</template>

<script setup>

defineProps({
    title: String,
    description: String,
    price: String,
    image_path: String,
    id: Number
})

</script>


