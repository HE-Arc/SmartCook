<template>
    <div>
        <Head title="Home" />

        <div>
            <h1>Home page</h1>
        </div>
    </div>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
}
</script>

<style lang="scss" scoped>

</style>
