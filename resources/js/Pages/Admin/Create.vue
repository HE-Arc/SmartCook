<!--
/**
 * Authors : Meier Simon and Margueron Yasmine
 *
 * Date : 10.01.2022
 */
 -->

<template>
    <Head title="Create a new recipe" />

        <TopAdmin/>

    <h2 class="h4 font-weight-bold">
        Create a new recipe
    </h2>


        <Link :href="route('recipes.index')" class="btn btn-primary mb-2">Go back</Link>

        <form @submit.prevent="form.post(route('recipes.store'))">
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <InputLabel
                                        v-model="form.name"
                                        :inputId="'inputName'"
                                        :labelText="'Name'"
                                        :formError="form.errors.name"
                                    />
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <span>Ingrédients</span>
                                        <br>
                                        <template v-for="ingredient in ingredients" :key="ingredient.name" style="margin:5px;">
                                            <input type="checkbox"
                                            v-model="form.ingredients"
                                            :inputId="'ingredients'"
                                            :formError="form.errors.ingredients"
                                            :id="ingredient.id"
                                            :value="ingredient.id"
                                            style="margin-left: 10px;margin-right: 2px;">
                                            <label :for="ingredient.id"> {{ ingredient.name }} </label>
                                        </template>
                                        <hr>
                                        <span>Sélectionné : {{ form.ingredients }} </span>

                                    </div>

                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.persons"
                                            :inputId="'persons'"
                                            :labelText="'Number of people'"
                                            :formError="form.errors.persons"
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.description"
                                            :inputId="'description'"
                                            :labelText="'Description of recipe'"
                                            :formError="form.errors.description"
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <span>Instructions</span>
                                        <br>
                                        <textarea v-model="form.instruction"
                                            :inputId="'instruction'"
                                            :labelText="'Instructions'"
                                            :formError="form.errors.instruction"
                                            placeholder="ajoutez les instructions sur plusieurs lignes"></textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.cook_time"
                                            :inputId="'cook_time'"
                                            :labelText="'Cooking time'"
                                            :formError="form.errors.cook_time"
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.category"
                                            :inputId="'category'"
                                            :labelText="'Category of recipe'"
                                            :formError="form.errors.category"
                                        />
                                    </div>
                                </div>

                                <breeze-validation-errors class="mt-3" />

                                <button type="submit" class="btn btn-primary mt-3" :disabled="form.processing">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <!--</breeze-authenticated-layout>-->
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, useForm, Link } from '@inertiajs/inertia-vue3'
import InputLabel from '@/Components/Form/InputLabel.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import TopAdmin from '@/Pages/Admin/TopAdmin.vue'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        InputLabel,
        BreezeValidationErrors,
        TopAdmin
    },


    props: [
        'ingredients'
    ],

    data() {
        return {
            form: useForm({
                name: null,
                ingredients: [],
                persons: null,
                description: null,
                instruction: null,
                cook_time: null,
                category: null,
            })
        }
    },
}
</script>
