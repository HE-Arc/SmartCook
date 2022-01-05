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

                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Ingredients</th>
                                <th scope="col">Persons</th>
                                <th scope="col">Description</th>
                                <th scope="col">Instructions</th>
                                <th scope="col">Cook time</th>
                                <th scope="col">Category</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="recipe in recipes" :key="recipe.id">

                                <td>{{recipe.name ?? "name manquante..."}}</td>
                        <td>
                            <span v-for="ingr in recipe.ingredients" :key="ingr.id">- {{ ingr.name }} <br> </span>
                        </td>                                <td>{{recipe.persons ?? "persons manquante..."}}</td>
                                <td>{{recipe.description ?? "Description manquante..."}}</td>
                                <td>{{recipe.instruction ?? "instruction manquante..."}}</td>
                                <td>{{recipe.cook_time ?? "cook_time manquante..."}}</td>
                                <td>{{recipe.category ?? "category manquante..."}}</td>
                                <td>
                                    <Link class="btn btn-info"><i class="bi bi-arrow-right-circle"></i></Link>
                                </td>

                            </tr>
                        </tbody>

                    </table>

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

  props: [
      'recipes'
  ],

}
</script>

<style lang="scss" scoped>

</style>
