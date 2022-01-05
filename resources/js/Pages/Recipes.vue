<template>
    <div class="max-w-md lg:max-w-3xl bg-white rounded-lg shadow mx-auto p-8">
        <h1>Recipes</h1>
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
                <tr v-for="recipe in recipes" :key="recipe.name">
                    <td>{{recipe.name ?? "name manquante..."}}</td>
                    <td>{{recipe.ingredients ?? "Ingredients manquante..."}}</td>
                    <td>{{recipe.persons ?? "persons manquante..."}}</td>
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
</template>


<script>
import { Head } from '@inertiajs/inertia-vue3'
import NavigationBar from '@/Pages/Top.vue'

export default {
  components: {
    Head,
    NavigationBar
  },

  props: {
      recipes: Object,
  },

}
</script>
