<template>


    <div  class=" relative px-2 md:px-0 w-fit flex flex-col justify-center max-w-md md:max-w-sm">
<div class="">
    <img @mouseenter="show_arrows = true" @mouseleave="show_arrows = false" class="rounded-lg w-72 h-72" :src="'/storage/' + images[index].image_path" alt="">

</div>
        <div v-show="show_arrows" @click="right_image()" class="cursor-pointer hover:cursor-pointer opacity-50 w-7 h-7 bg-white flex justify-center items-center rounded-full absolute right-2 md:right-1 top-1/3 ">
            <i class="fa-solid fa-chevron-right scale-75"></i>
        </div>
        <div v-show="show_arrows" @click="left_image()"  class="cursor-pointer hover:cursor-pointer opacity-50 w-7 h-7 bg-white flex justify-center items-center rounded-full absolute left-2 md:left-1 top-1/3 ">
            <i class="fa-solid fa-chevron-left scale-75"></i>
        </div>
        <p class="absolute bottom-12 text-green-600 text-xs rounded-full px-2 bg-yellow-300">{{index + 1}} of {{images.length}}</p>


        <Link :href="`/listing/${id}`" class="px-3">
            <p class="font-semibold text-xs max-h-4 overflow-hidden">{{ title }}</p>
            <p class="font-thin text-xs text-gray-600 max-h-4 overflow-hidden"> {{description}}</p>
            <p class="text-xs"> <span class="font-semibold">{{ price }}$</span> per night</p>
        </Link>
    </div>
</template>

<script setup>

import {ref} from "vue";

const props = defineProps({
    title: String,
    description: String,
    price: String,
    images: Array,
    id: Number
});

const show_arrows = ref(false);

let index = ref(0);

let path = ref(props.images[index])?? '';

function right_image(){
    if(index.value < props.images.length -1){
        index.value++;
    }else{
        index.value = 0;
    }
    console.log(index.value);
}

function left_image(){
    if(index.value > 0){
        index.value--;
    }else{
        index.value = props.images.length - 1;
    }
    console.log(index.value);
}




</script>


<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
