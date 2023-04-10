<script setup>
import FilterBar from "@/Components/Filter/FilterBar.vue";
import CardComponent from "@/Components/CardComponent.vue";
import GridComponent from "@/Components/GridComponent.vue";
import PaginatorComponent from "@/Components/PaginatorComponent.vue";
import Popup from "@/Components/Popup.vue";
import BingMap from "@/Components/BingMap.vue";

defineProps({
    listings: Object,
    address: Object
});

</script>

<template>
<div class="w-full ">



    <div class="">
        <FilterBar class="z-50  w-full bg-white w-full" ></FilterBar>

    </div>
    <div class="">
        <GridComponent>
            <CardComponent :id="listing.id" v-for="listing in listings.data" :title="listing.title" :price="listing.price" :description="listing.description"/>
        </GridComponent>

        <PaginatorComponent :listings="listings"/>
        <Popup class="h-72 w-6/12 top-1/3 right-1/4 bg-white border border-black">
            <BingMap :longAndLat="address" class="w-full"></BingMap>
        </Popup>
    </div>
</div>


</template>

