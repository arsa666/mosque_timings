<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddMosqueForm from './AddMosqueForm.vue';
import ShowMosquesTable from './ShowMosquesTable.vue';

import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    mosques: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Mosques" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mosques</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <AddMosqueForm
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <ShowMosquesTable 
                     :mosques="mosques"
                    class="max-w-xl" />
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
