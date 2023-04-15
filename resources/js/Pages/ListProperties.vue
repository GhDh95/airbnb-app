<template>
        <AuthenticatedLayout>
            <div class="h-screen">
                <div v-show="listings.listing.length > 0" class="h-fit -border-t border-gray-300 shadow-lg rounded-lg mt-16 py-2">
                    <table class="table-auto">
                        <thead class="">
                        <tr class="">
                            <th class="px-2">Listing</th>
                            <th class="px-2">Description</th>
                            <th class="px-2">Price</th>
                            <th class="px-2">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr :id="listing.id" v-for="listing in listings.listing">
                            <td class="text-center px-2">{{listing.title}}</td>
                            <td class="text-center px-2">{{listing.description}}</td>
                            <td class="text-center px-2">{{listing.price}}</td>
                            <td class="text-center px-2">
                                <Link :href="'/listing/destroy/' + listing.id"  method="post" as="button">
                                    <i class="fa-solid fa-x scale-80"></i>
                                </Link>
                            </td>
                        </tr>


                        </tbody>
                    </table>

                </div>

                <div class="md:mt-20"  v-show="listings.listing.length === 0">
                    <p class="text-2xl">You have no listings.</p>
                </div>
            </div>
        </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    listings:Object
})
</script>
