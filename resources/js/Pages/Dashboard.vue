<template>
  <Head title="Dashboard" />

  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Dashboard
      </h2>
    </template>

    <div class="card my-4 shadow-sm">
        <div class="card-body">
        You're logged in!
        </div>
        <div class="card-body">
            <Link @click="home" class="btn btn-primary">Home</Link>
        </div>
    </div>

  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head
    },

    methods: {
        home() {
            Inertia.get(route('home.index'));
        }
    }
}
</script>
