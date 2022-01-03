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

                    <div>
                            <div class="mx-auto pull-right">
                                <div class="">
                                    <form action="{{ route('home.index') }}" method="GET" role="search">

                                        <div class="input-group">
                                            <span class="input-group-btn mr-5 mt-1">
                                                <button class="btn btn-info" type="submit" title="Search projects">
                                                    <span class="fas fa-search"></span>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                                            <a href="{{ route('projects.index') }}" class=" mt-1">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                                        <span class="fas fa-sync-alt"></span>
                                                    </button>
                                                </span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
  ]
}
</script>

<style lang="scss" scoped>

</style>
