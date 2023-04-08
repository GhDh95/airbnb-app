<template>
    <div v-if="message" class="flex justify-center ">
        <div class=" w-72 py-2 bg-red-500 rounded-lg border border-gray-300 fixed z-50 bottom-0 ">
            <p class="text-center text-white font-semibold">{{message}}</p>
        </div>
    </div>
</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";


const message = computed(()=> usePage().props.flash.message);




</script>


