<!--
/**
 * Authors : Meier Simon and Margueron Yasmine
 *
 * Date : 10.01.2022
 */
 -->

 <template>
    <Head title="Edit a recipe" />

    <!--<breeze-authenticated-layout>-->

    <h2 class="h4 font-weight-bold">
        Edit a recipe
    </h2>

        <TopAdmin/>

        <Link :href="route('recipes.index')" class="btn btn-primary mb-2">Go back</Link>

        <form @submit.prevent="form.put(route('recipes.update', recipe[0]))">
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <!--<label for="name">Name : </label><br>
                                    <input type="text" id="name" name="name" v-bind:value=recipe[0].name><br><br>-->
                                    <InputLabel
                                        v-model="form.name"
                                        :inputId="'inputName'"
                                        :labelText="'Name'"
                                        :formError="form.errors.name"
                                    />
                                    <label style="color: gray;">{{ recipe[0].name }} </label>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <span>Ingredients</span>
                                        <br>
                                        <template v-for="ingredient in ingredients" :key="ingredient.name" style="margin:5px;">
                                                <input type="checkbox"
                                                v-model="form.ingredients"
                                                :inputId="'ingredients'"
                                                :formError="form.errors.ingredients"
                                                :id="ingredient.id"
                                                :value="ingredient.id"
                                                style="margin-left: 10px;margin-right: 2px;"
                                                :checked="true"
                                                >
                                                <label :for="ingredient.id"> {{ ingredient.name }} </label>
                                        </template>
                                        <hr>
                                        <span>Sélectionné : {{ form.ingredients }} </span>
                                        <br>
                                        <template v-for="ingredient in recipe[0].ingredients" :key="ingredient.name" style="margin:5px;">
                                                <label :for="ingredient.id" style="color: gray;"> {{ ingredient.name }},  </label>
                                        </template>

                                    </div>

                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.persons"
                                            :inputId="'persons'"
                                            :labelText="'Number of people'"
                                            :formError="form.errors.persons"
                                        />
                                        <label style="color: gray;">{{ recipe[0].persons }}</label>
                                        <br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.description"
                                            :inputId="'description'"
                                            :labelText="'Description of recipe'"
                                            :formError="form.errors.description"
                                        />

                                        <label style="color: gray;">{{ recipe[0].description }} </label><br>

                                    </div>
                                    <div class="form-group col-6">
                                        <label for="instruction">Instruction : </label><br>
                                        <textarea v-model="form.instruction"
                                            :inputId="'instruction'"
                                            :labelText="'Instructions'"
                                            :formError="form.errors.instruction"
                                            placeholder="ajoutez les instructions sur plusieurs lignes"></textarea>
                                        <br>
                                        <label style="color: gray;">{{ recipe[0].instruction }}</label><br><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.cook_time"
                                            :inputId="'cook_time'"
                                            :labelText="'Cooking time'"
                                            :formError="form.errors.cook_time"
                                        />
                                        <label style="color: gray;">{{ recipe[0].cook_time }} </label><br>
                                    </div>
                                    <div class="form-group col-6">
                                        <InputLabel
                                            v-model="form.category"
                                            :inputId="'category'"
                                            :labelText="'Category of recipe'"
                                            :formError="form.errors.category"
                                        />
                                        <label style="color: gray;">{{ recipe[0].category }} </label><br>
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
