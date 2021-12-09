<template>
    <Head title="Create a new recipe" />

    <breeze-authenticated-layout>

    <h2 class="h4 font-weight-bold">
            Create a new recipe
        </h2>

        <Link :href="route('admin.index')" class="btn btn-primary mb-2">Go back</Link>

        <form @submit.prevent="form.post(route('admin.store'))">
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
                                        <InputLabel
                                            v-model="form.ingredients"
                                            :inputId="'inputPages'"
                                            :labelText="'ingredients'"
                                            :formError="form.errors.ingredients"
                                        />
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
                                        <InputLabel
                                            v-model="form.instruction"
                                            :inputId="'instruction'"
                                            :labelText="'Instructions'"
                                            :formError="form.errors.instruction"
                                        />
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
        Link,
        InputLabel,
        BreezeValidationErrors,
    },
    data() {
        return {
            form: useForm({
                name: null,
                ingredients: null,
                persons: null,
                description: null,
                instruction: null,
                cook_time: null,
                category: null
            })
        }
    },
}
</script>
