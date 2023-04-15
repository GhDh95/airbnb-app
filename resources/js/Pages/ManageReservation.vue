<template>
    <AuthenticatedLayout>

<div class="h-screen">
    <div class="h-fit -border-t border-gray-300 shadow-lg rounded-lg mt-16 py-2">
        <table class="table-auto md:table-fixed w-full">
            <thead>
            <tr class="border-b border-gray-200">
                <th>Listing</th>
                <th>Reserved by</th>
                <th>From</th>
                <th>To</th>
                <th>Delete reservation</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="reservation in reservations">
                <td class="text-center">{{ reservation.listing.title }}</td>
                <td class="text-center">{{ reservation.user.name }}</td>
                <td class="text-center">{{ reservation.start_date }}</td>
                <td class="text-center">{{ reservation.end_date }}</td>
                <td class="text-center">
                    <Link :href="'/reservation/destroy/' + reservation.id" method="post" as="button">
                        <i class="fa-solid fa-x scale-75"></i>
                    </Link>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

</div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    reservations: Array
});

console.log(props.reservations) ;


</script>

