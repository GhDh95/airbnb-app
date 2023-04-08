<script setup>
import FilterBar from "@/Components/Filter/FilterBar.vue";
import CardComponent from "@/Components/CardComponent.vue";
import GridComponent from "@/Components/GridComponent.vue";
import PaginatorComponent from "@/Components/PaginatorComponent.vue";

defineProps({
    listings: Object,
});

</script>

<template>

    <FilterBar/>



    <GridComponent>
        <CardComponent :id="listing.id" v-for="listing in listings.data" :title="listing.title" :price="listing.price" :description="listing.description"/>
    </GridComponent>

    <PaginatorComponent :listings="listings"/>

</template>

