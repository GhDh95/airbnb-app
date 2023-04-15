<template>

    <Link :class="{'bg-gray-300' : active}" class="hover:bg-gray-300 rounded-lg px-2 py-1" :href="url">
        <slot></slot>
    </Link>

</template>

<script setup>

defineProps({
    url: String,
    active:Boolean
});

</script>
