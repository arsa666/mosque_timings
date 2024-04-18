<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Mosque list</h2>
        </header>
    <div>
        <table v-if="mosques.length > 0" class="table-fixed text-left">
            <thead>
            <tr>
                <th class="px-2 w-1/8">Name</th>
                <th class="px-2 w-1/8">Fajr</th>
                <th class="px-2 w-1/8">Dhuhr</th>
                <th class="px-2 w-1/8">Asr </th>
                <th class="px-2 w-1/8">Maghrib</th>
                <th class="px-2 w-1/8">Isha</th>
                <th class="px-2 w-1/8">Jummah</th>
                <th class="px-2 w-1/8">Share</th>
            </tr>
            </thead>
           
            <tbody>
            <tr v-for="mosque in mosques" :key="mosque.id">
                <td class="px-2 w-1/8">{{ mosque.name }}</td>
                <td class="px-2 w-1/8">{{ mosque.fajr_time }}</td>
                <td class="px-2 w-1/8">{{ mosque.dhuhr_time }}</td>
                <td class="px-2 w-1/8">{{ mosque.asr_time }}</td>
                <td class="px-2 w-1/8">{{ mosque.maghrib_time }}</td>
                <td class="px-2 w-1/8">{{ mosque.isha_time }}</td>
                <td class="px-2 w-1/8">{{ mosque.jummah_time }}</td>
                <td class="px-2 w-1/8"  v-on:click="copyToClipboard(`url/${mosque.id}`)">Copy</td>
            </tr>
            </tbody>
        </table>

        <div v-else>
            No mosques created yet.
        </div>
    </div>
    </section>
</template>

<script>
export default {
    props: {
        mosques: {
            type: Array,
            required: true
        }
    },
    methods: {
    copyToClipboard(link) {
        alert(link);
      
    }
}
}






</script>

<style>
/* Add your custom styles here */
</style>