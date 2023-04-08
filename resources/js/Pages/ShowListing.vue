<script setup>
import CardComponent from "@/Components/CardComponent.vue";

defineProps({
    listing: Object
})
</script>

<template>
    <div class="mx-auto max-w-7xl flex flex-col pt-10 px-5">
        <div class=" ">
            <p>Title</p>
            <p>Owner</p>
        </div>
        <div class=" rounded-lg py-12 md:flex space-x-2 space-y-2 md:space-y-0 border-b border-gray-300">
            <div class="">
                <img class="rounded-lg w-[1400px] h-full" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">

            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class=""><img class="w-full h-full rounded-lg" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">
                </div>
                <div><img class="rounded-lg" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">
                </div>
                <div><img class="rounded-lg" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">
                </div>
                <div><img class="rounded-lg" src="/images/6ba850bd-6582-45a5-bce7-5b96dc6f30dd.webp" alt="">
                </div>

            </div>
        </div>
        <div>
            <p>Description</p>
        </div>
    </div>


</template>



