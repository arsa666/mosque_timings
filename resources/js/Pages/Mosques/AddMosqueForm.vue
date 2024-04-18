<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});


const form = useForm({
    name: '',
    fajr_time: '',
    dhuhr_time: '',
    asr_time: '',
    maghrib_time: '',
    isha_time: '',
    jummah_time: '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Add Mosque</h2>

            <p class="mt-1 text-sm text-gray-600">
                Create your local mosque
            </p>
        </header>

        <form @submit.prevent="form.post(route('mosque.create'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div> 

            <div>
                <InputLabel for="fajr_time" value="Fajr time" />
                <TextInput
                    id="fajr_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.fajr_time"
                    required
                    autofocus
                    autocomplete="fajr_time"
                />

                <InputError class="mt-2" :message="form.errors.fajr_time" />
            </div>
            <div>
                <InputLabel for="dhuhr_time" value="Dhuhr time" />
                <TextInput
                    id="dhuhr_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.dhuhr_time"
                    required
                    autofocus
                    autocomplete="dhuhr_time"
                />

                <InputError class="mt-2" :message="form.errors.dhuhr_time" />
            </div>
            <div>
                <InputLabel for="asr_time" value="Asr time" />
                <TextInput
                    id="asr_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.asr_time"
                    required
                    autofocus
                    autocomplete="asr_time"
                />

                <InputError class="mt-2" :message="form.errors.asr_time" />
            </div>
            <div>
                <InputLabel for="maghrib_time" value="Maghrib time" />
                <TextInput
                    id="maghrib_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.maghrib_time"
                    required
                    autofocus
                    autocomplete="maghrib_time"
                />

                <InputError class="mt-2" :message="form.errors.maghrib_time" />
            </div>
            <div>
                <InputLabel for="isha_time" value="Isha time" />
                <TextInput
                    id="isha_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.isha_time"
                    required
                    autofocus
                    autocomplete="isha_time"
                />

                <InputError class="mt-2" :message="form.errors.isha_time" />
            </div>
            <div>
                <InputLabel for="jummah_time" value="Jummah time" />
                <TextInput
                    id="jummah_time"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.jummah_time"
                    required
                    autofocus
                    autocomplete="jummah_time"
                />

                <InputError class="mt-2" :message="form.errors.jummah_time" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Create</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
