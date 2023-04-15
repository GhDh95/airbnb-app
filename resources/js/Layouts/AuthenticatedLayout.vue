<template>

    <div class="md:flex md:flex-row">
        <div class="md:w-1/3 bg-gray-100 rounded flex md:flex-col justify-between md:justify-start px-2 md:px-6 md:py-6 md:space-y-2 ">
            <SideBarNavItem :active="$page.component === 'Profile/Edit'" :href="'/profile'">Profile</SideBarNavItem>
            <SideBarNavItem :active="$page.component === 'Auth/CreateListing'" :href="'/listing/create'">Create Listing</SideBarNavItem>
            <SideBarNavItem :active="$page.component === 'ListProperties'" :href="'/user/listings'">View Listings</SideBarNavItem>
            <SideBarNavItem :active="$page.component === 'ManageReservation'" :href="'/user/reservations'">Manage Reservations</SideBarNavItem>
        </div>

        <div class=" flex justify-center md:px-2 w-full">
            <slot></slot>
        </div>
    </div>

</template>

<script setup>

import SideBarNavItem from "@/Components/SideBarNavItem.vue";
import Edit from "@/Pages/Profile/Edit.vue";

console.log()
</script>


