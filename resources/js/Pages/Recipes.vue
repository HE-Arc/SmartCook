<template>
  <Head title="Recipes" />
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">
        Recipes
      </h2>
    </template>
    <!-- Page content here -->

    <h1>Recipes</h1>
<!--
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Persons</th>
                <th scope="col">Description</th>
                <th scope="col">Instrution</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="recipe in recipes.data" :key="recipes.id">
                <td>{{recipe.name ?? "Description manquante..."}}</td>
                <td>{{recipe.ingredients ?? "Description manquante..."}}</td>
                <td>{{recipe.persons ?? "Description manquante..."}}</td>
                <td>{{recipe.description ?? "Description manquante..."}}</td>
                <td>
                    <Link class="btn btn-info"><i class="bi bi-arrow-right-circle"></i></Link>
                    <Link class="btn btn-primary"><i class="bi bi-pencil"></i></Link>
                    <button @click="destroy(book.id)"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    -->
    <Link href="route('recipes.create')" class="btn btn-primary mb-2">Add recipes</Link>

  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
  }
}
</script>
