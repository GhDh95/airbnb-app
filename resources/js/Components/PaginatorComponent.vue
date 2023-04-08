<script setup>
defineProps({
    listings: Object,
});
</script>

<template>
    <div class="flex space-x-2 justify-center">
        <Component :href="link.url" :is="link.url ? 'Link' : 'span'" :class="{'text-gray-500' : !link.url , 'font-bold' : link.active}" v-for="link in listings.links" v-html="link.label"></Component>
    </div>
</template>


