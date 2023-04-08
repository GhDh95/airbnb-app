<script setup>
import Navigation from "@/Components/Navigation.vue";
import FlashMessage from "@/Components/FlashMessage.vue";

</script>


<template>

    <div class="font-lato relative">
        <Navigation/>
        <FlashMessage></FlashMessage>
        <slot></slot>

    </div>

</template>
