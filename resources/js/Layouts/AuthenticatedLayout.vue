<template>

    <div class="flex flex-col">
        <div class="md:fixed  md:min-h-screen bg-gray-100 rounded flex md:flex-col justify-between md:justify-start px-2 md:px-6 md:py-6 ">
            <Link class="hover:bg-gray-300 rounded-lg md:p-2" href="/profile">Profile</Link>
            <Link href="/listing/create" class="hover:bg-gray-300 rounded-lg md:p-2">create Listing</Link>
            <p class="hover:bg-gray-300 rounded-lg md:p-2">Delete Listing</p>
            <p class="hover:bg-gray-300 rounded-lg md:p-2">Show Reservations</p>
        </div>
        <div class=" flex justify-center px-2 md:px-0">
            <slot></slot>
        </div>
    </div>

</template>

<script setup>

</script>


