<template>
    <nav class="navbar navbar-default navbar-fixed-top" id="navBar">
        <div class="container">

            <div class="navbar-header">
                <img :src="getImage()" alt="Smartcook" height="200" href="#"/>

                <a class="navbar-brand" href="#"></a>
            </div>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><router-link :to="{ name: 'recipes'}">Recipes</router-link></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <li v-if="!authorized"><router-link :to="{ name: 'login'}">Login</router-link></li>
                    <li v-if="!authorized"><router-link :to="{ name: 'register'}">Register</router-link></li>

                    <li class="dropdown" v-if="authorized">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="" @click.prevent="logout()">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </nav>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  methods: {
      getImage() {
        return 'assets/images/logo.PNG';
      }
  }
}
</script>

