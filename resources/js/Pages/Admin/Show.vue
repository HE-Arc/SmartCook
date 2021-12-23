<template>
    <Head title="Show a recipe" />

    <breeze-authenticated-layout>

    <h2 class="h4 font-weight-bold">
        Show a recipe
    </h2>

    <Link :href="route('admin.index')" class="btn btn-primary mb-2">Go back</Link>

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Afficher un livre
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <strong>Nom :</strong>
                            {{ $recipe.name }}
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <strong>Ingrédients :</strong>
                                {{ $recipe.ingredients }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Nombre de personnes :</strong>
                                {{ $recipe.persons }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Description :</strong>
                                {{ $recipe.description }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Instruction :</strong>
                                {{ $recipe.instruction }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Temps de préparation :</strong>
                                {{ $recipe.cook_time }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Catégorie :</strong>
                                {{ $recipe.category }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</breeze-authenticated-layout>

</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, useForm, Link } from '@inertiajs/inertia-vue3'
import InputLabel from '@/Components/Form/InputLabel.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'

export default {
    components: {
    BreezeAuthenticatedLayout,
    Head,
    Link
  },
  props: [
      'recipe'
  ]
}
</script>
