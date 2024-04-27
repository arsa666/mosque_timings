<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    mosque: {
        type: Object,
    }
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

const copyToClipboard = () => {
    navigator.clipboard.writeText(window.location.href);
};


</script>

//create style tag for class
<style>
    .link {
        color: #3905f5;
        cursor: pointer;
    }
</style>

<template>
    <Head title="Mosque" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative min-h-screen flex flex-col items-center justify-start selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-1 items-center gap-2 py-10 lg:grid-cols-1">
                    <div>Share this link with anyone that needs the prayer times for your mosque.</div>
                    <div>Click <span class="link" v-on:click="copyToClipboard()"> here </span> to copy the link </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                       
                        <div
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800"
                        >
                           

                            <div class="pt-3 sm:pt-5">
                                <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Name:</span>
                                <span class="px-2">{{ mosque.name }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Fajr:</span>
                                <span>{{ mosque.fajr_time }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Dhuhr:</span>
                                <span>{{ mosque.dhuhr_time }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Asr:</span>
                                <span>{{ mosque.asr_time }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Maghrib:</span>
                                <span>{{ mosque.maghrib_time }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Isha:</span>
                                <span>{{ mosque.isha_time }}</span>
                        </div>
                    </div>
                    <div class="flex space-y-4">
                        <div class="flex">
                                <span class="font-semibold">Jummah:</span>
                                <span>{{ mosque.jummah_time }}</span>
                        </div>
                    </div>

                              
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                   Salah App &copy; 2024
                </footer>
            </div>
        </div>
    </div>
</template>
