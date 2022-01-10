 <template>
    <div>
        <Head title="Admin" />

        <div>

            <div class="page-content">

                <Link :href="route('recipes.create')" class="btn btn-primary mb-2">Create a recipe</Link>

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
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="recipe in recipes" :key="recipe.id">
                        <td>{{recipe.name ?? "name manquante..."}}</td>
                        <td>
                            <span v-for="ingr in recipe.ingredients" :key="ingr.id">- {{ ingr.name }} <br> </span>
                        </td>
                        <td>{{recipe.persons ?? "persons manquante..."}}</td>
                        <td>{{recipe.description ?? "Description manquante..."}}</td>
                        <td>{{recipe.instruction ?? "instruction manquante..."}}</td>
                        <td>{{recipe.cook_time ?? "cook_time manquante..."}}</td>
                        <td>{{recipe.category ?? "category manquante..."}}</td>
                        <td>
                            <Link :href="route('recipes.show', recipe.id)" class="btn btn-info"><i class="bi bi-arrow-right-circle"></i></Link>
                        </td>

                        <td>
                            <Link :href="route('recipes.edit', recipe.id)" class="btn btn-primary" ><i class="bi bi-pencil"></i></Link>
                        </td>

                        <td>
                            <button @click="destroy(recipe.id)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </td>


                    </tr>
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link
  },
  props: [
      'recipes',
      'ingredients',
  ],

  methods: {
      destroy(id) {
            console.table("method destroy avant " + id);
            Inertia.delete(route('recipes.destroy', id));
      },

      console_log(truc) {
          console.table(truc);
      }
  }
}
</script>
