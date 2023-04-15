<template>

    <div class="flex flex-col">
        <div class="md:fixed  md:min-h-screen bg-gray-100 rounded flex md:flex-col justify-between md:justify-start px-2 md:px-6 md:py-6 md:space-y-2 ">
            <SideBarNavItem :active="$page.component === 'Profile/Edit'" :href="'/profile'">Profile</SideBarNavItem>
            <SideBarNavItem :active="$page.component === 'Auth/CreateListing'" :href="'/listing/create'">Create Listing</SideBarNavItem>
            <SideBarNavItem :active="$page.component === 'ListProperties'" :href="'/user/listings'">View Listings</SideBarNavItem>
        </div>
        <div class=" flex justify-center px-2 md:px-0">
            <slot></slot>
        </div>
    </div>

</template>

<script setup>

import SideBarNavItem from "@/Components/SideBarNavItem.vue";
import Edit from "@/Pages/Profile/Edit.vue";

console.log()
</script>


