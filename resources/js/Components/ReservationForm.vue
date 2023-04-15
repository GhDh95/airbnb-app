<template>
    <VueDatePicker v-model="date" range :enable-time-picker="false">
    </VueDatePicker>

    <button @click="submit" class="self-center md:self-start py-2 px-3 bg-red-500 text-white rounded-full mt-2 hover:opacity-75">Make a reservation</button>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import {router} from "@inertiajs/vue3";

const props = defineProps({
    listing_id: Number
})

const date = ref();


onMounted(() => {

    const startDate = new Date().toLocaleDateString();
    const endDate = new Date(new Date().setDate(new Date().getDate() + 7)).toLocaleDateString();
    date.value = [startDate, endDate];
});



let submit = () => {
   router.post( `/listing/reservation/${props.listing_id}`, {
       start_date: date.value[0],
       end_date: date.value[1]

   })
};


</script>

