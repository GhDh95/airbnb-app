<template>
    <div class="h-full w-full" id="map"></div>
</template>

<script setup>
import { onMounted} from "vue";

const props = defineProps({
    coordinates :Object

});

let map;

onMounted(async ()=> {
     map = L.map('map').setView([51.505, -0.09], 5);


    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function clickZoom(e) {
        map.setView(e.target.getLatLng(),5);
    }

    if(props.coordinates !== null){
        for(let key in props.coordinates){
            if(props.coordinates[key].coordinates !== null){
                let marker = L.marker([props.coordinates[key].coordinates.lat, props.coordinates[key].coordinates.lng]).addTo(map);
                let url = `/listing/${props.coordinates[key].listing_id}`;
                marker.bindPopup(`<a href=${url}>${props.coordinates[key].price}$ per night</a>`).openPopup().on('click', clickZoom);

            }
        }
    }


});


</script>

