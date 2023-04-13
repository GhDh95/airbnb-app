<script setup>
import FilterBar from "@/Components/Filter/FilterBar.vue";
import CardComponent from "@/Components/CardComponent.vue";
import GridComponent from "@/Components/GridComponent.vue";
import PaginatorComponent from "@/Components/PaginatorComponent.vue";
import Popup from "@/Components/Popup.vue";
import BingMap from "@/Components/BingMap.vue";
import {ref} from "vue";

defineProps({
    listings: Object,
    coordinates: Object
});

let show_map = ref(false);

</script>

<template>
<div class="w-full ">



    <div class="">
        <FilterBar class="z-50  w-full bg-white w-full" ></FilterBar>

    </div>
    <div class="">
        <GridComponent>
            <CardComponent :images="listing.images" :id="listing.id" v-for="listing in listings.data" :title="listing.title" :price="listing.price" :description="listing.description"/>
        </GridComponent>

        <PaginatorComponent :listings="listings"/>
        <Popup :class="!show_map? 'invisible' : 'visible'">
            <BingMap :coordinates="coordinates" class="w-full"></BingMap>
        </Popup>
        <button v-html="!show_map? 'show map' : 'hide map'" @click="show_map = !show_map" class="fixed hide md:block bottom-1 right-1   bg-black text-white rounded-full px-3 py-1 hover:opacity-75"></button>

    </div>
</div>


</template>

