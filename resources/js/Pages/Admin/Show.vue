<!--
/**
 * Authors : Meier Simon and Margueron Yasmine
 *
 * Date : 10.01.2022
 */
 -->

 <template>
    <Head title="Show a recipe" />

        <TopAdmin/>

    <div v-for="re in recipe" :key="re.id" style="margin:3em; ">
        <Link :href="route('recipes.index')" class="btn btn-primary mb-2">Go back</Link>

        <h1 style="text-align:center;">{{ re.name }}</h1>
        <br>
        <br>

        <div style="float:right; width:60%;">
            <h4>Number of persons : {{ re.persons }}</h4>
            <h4>Cook time : {{ re.cook_time }}</h4>
            <h4>Description : {{ re.description }} </h4>
        </div>

        <div style="float:left; width:40%;">
            <table class="table" style="width:50%; text-align:center; margin: auto;">
                <thead>
                    <tr>
                        <th scope="col">Quantity</th>
                        <th scope="col">Ingredient</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="ingr in re.ingredients" :key="ingr.id">
                        <td>{{ ingr.pivot.quantity }}</td>
                        <td>{{ ingr.name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 10em;">
            <br>
            <h4>Instructions : </h4>
            <p>{{ re.instruction }}</p>
        </div>


    </div>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import TopAdmin from '@/Pages/Admin/TopAdmin.vue'

export default {
    components: {
        Head,
        Link,
        TopAdmin
    },
    props: [
        'recipe'
    ]
}
</script>
