<script setup>

import {usePage} from "@inertiajs/vue3";

const categories =  usePage().props.categories;
</script>


<template>
    <div class="flex justify-between overflow-x-auto max-w-7xl mx-auto py-10 border-b border-gray-200">
        <Link href="/" :data="{category: category.name}" class="flex flex-col items-center text-gray-400 hover:text-black transition ease-in shrink-0 px-3" v-for="category in categories">
            <i :class="category.slug" class="fa-solid"></i>
            <p v-html="category.name"></p>
        </Link>
    </div>
</template>


