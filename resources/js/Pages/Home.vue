<template>
    <div>
        <Head title="Home" />

        <div>
            <NavigationBar/>

            <div class="page-content">
                <h1>Welcome!</h1>
                <h2>Let's search some recipes with specifics ingredients</h2>

                <form autocomplete="off" action="#">
                    <div class="autocomplete" style="width:300px;">
                        <input id="search-ingredients" type="text" name="ingredients" placeholder="Ingredients">
                    </div>
                </form>

                <div class="result-search">
                    <h3>Result of the research:</h3>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import NavigationBar from '@/Pages/Top.vue'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    NavigationBar
  },
}
</script>

<style lang="scss" scoped>

</style>
