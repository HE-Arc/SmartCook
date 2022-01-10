<template>
    <Head title="Edit a recipe" />

    <!--<breeze-authenticated-layout>-->

    <h2 class="h4 font-weight-bold">
        Edit a recipe
    </h2>

        <Link :href="route('recipes.index')" class="btn btn-primary mb-2">Go back</Link>

        <form @submit.prevent="form.post(route('recipes.store'))">
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="name">Name : </label><br>
                                    <input type="text" id="name" name="name" v-bind:value=recipe[0].name><br><br>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <span>Ingredients</span>
                                        <br>
                                        <template v-for="ingredient in ingredients" :key="ingredient.name" style="margin:5px;">
                                            <!--<template v-for="recIn in recipe[0].ingredients" :key="recIn.name">-->
                                                <input type="checkbox"
                                                v-model="form.ingredients"
                                                :inputId="'ingredients'"
                                                :formError="form.errors.ingredients"
                                                :id="ingredient.id"
                                                :value="ingredient.id"
                                                style="margin-left: 10px;margin-right: 2px;"
                                                :checked="true"
                                                >
                                                <!-- :checked="recIn.name == ingredient ? true: false" -->
                                                <label :for="ingredient.id"> {{ ingredient.name }} </label>
                                        </template>
                                        <hr>
                                        <span>Sélectionné : {{ form.ingredients }} </span>


                                    </div>

                                    <div class="form-group col-6">
                                        <label for="persons">Persons : </label><br>
                                        <input type="text"
                                            :formError="form.errors.persons"
                                            :inputId="'form.persons'"
                                            id="form.persons"
                                            name="form.persons"
                                            v-bind:value=recipe[0].persons>
                                        <br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="description">Description : </label><br>
                                        <textarea type="text" id="description" name="description" v-bind:value=recipe[0].description> </textarea><br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="instruction">Instruction : </label><br>
                                        <textarea type="text" id="instruction" name="instruction" v-bind:value=recipe[0].instruction></textarea><br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="cook_time">Cook time : </label><br>
                                        <input type="text" id="cook_time" name="cook_time" v-bind:value=recipe[0].cook_time><br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="category">Category : </label><br>
                                        <input type="text" id="category" name="cytegory" v-bind:value=recipe[0].category><br><br>
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        InputLabel,
        BreezeValidationErrors,
    },


    props: [
        'recipe',
        'ingredients'
    ],

    methods: {
        console_log(truc) {
            console.table(truc);
        }
    },

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
