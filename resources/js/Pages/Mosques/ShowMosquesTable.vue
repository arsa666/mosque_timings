<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm} from '@inertiajs/vue3';
import { isProxy, toRaw, ref } from 'vue';


defineProps({
        mosques: {
            type: Array,
            required: true
        }
});

const showEditModal = ref(false);

const form = useForm({
    id: null,
    name: null,
    fajr_time: null,
    dhuhr_time: null,
    asr_time: null,
    maghrib_time: null,
    isha_time: null,
    jummah_time: null,
});


const goToPage = (link) => {
    //redirect to the link
    window.location.href = link;
};
const editMosque = (mosque) => {
    showEditModal.value = true;
    let rawData = toRaw(mosque);
    form.id = rawData.id;
    form.name = rawData.name;
    form.fajr_time = rawData.fajr_time;
    form.dhuhr_time = rawData.dhuhr_time;
    form.asr_time = rawData.asr_time;
    form.maghrib_time = rawData.maghrib_time;
    form.isha_time = rawData.isha_time;
    form.jummah_time = rawData.jummah_time;
};

const updateMosque = () => {
        form.patch(route('mosque.update', {}), {
            preserveScroll: true,
            onSuccess: () => showEditModal.value = false,
        });
};

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Mosque list</h2>
        </header>
    <div>
        
        <table v-if="mosques.length > 0" class="table-fixed text-left">
            <thead>
            <tr>
                <th class="px-1 w-1/9">Name</th>
                <th class="px-1 w-1/9">Fajr</th>
                <th class="px-1 w-1/9">Dhuhr</th>
                <th class="px-1 w-1/9">Asr </th>
                <th class="px-1 w-1/9">Maghrib</th>
                <th class="px-1 w-1/9">Isha</th>
                <th class="px-1 w-1/9">Jummah</th>
                <th class="px-1 w-1/9">Share</th>
                <th class="px-1 w-1/9">Edit</th>
            </tr>
            </thead>
           
            <tbody>
            <tr v-for="mosque in mosques" :key="mosque.id">
                <td class="px-1 w-1/9">{{ mosque.name }}</td>
                <td class="px-1 w-1/9">{{ mosque.fajr_time }}</td>
                <td class="px-1 w-1/9">{{ mosque.dhuhr_time }}</td>
                <td class="px-1 w-1/9">{{ mosque.asr_time }}</td>
                <td class="px-1 w-1/9">{{ mosque.maghrib_time }}</td>
                <td class="px-1 w-1/9">{{ mosque.isha_time }}</td>
                <td class="px-1 w-1/9">{{ mosque.jummah_time }}</td>
                <td class="px-1 w-1/9"  v-on:click="goToPage(`mosque/${mosque.id}`)">Go to page</td>
                <td class="px-1 w-1/9"  v-on:click="editMosque(mosque)">Edit</td>
            </tr>
            </tbody>
        </table>

        <div v-else>
            No mosques created yet.
        </div>
    </div>


    <Modal :show="showEditModal" @close="showEditModal = false">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Edit Mosque
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Edit your local mosque
            </p>

            <div class="mt-6 space y-6">
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
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="showEditModal = false; form.reset();"> Cancel </SecondaryButton>
                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="updateMosque"
                    >
                        Update Mosque
                    </PrimaryButton>
                </div>
            </div> 
        </div>
    </Modal>


    
</section>
</template>
