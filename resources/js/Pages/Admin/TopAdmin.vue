<template>
    <nav class="navbar navbar-default navbar-fixed-top" id="navBar" style="background-color: #feedd2">
        <div class="container">

            <div class="navbar-header">
                <a href="#" class="navbar-brand">
                    <img :src="getImage()" alt="Smartcook" height="200"/>
                </a>
            </div>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><router-link @click="home" style="font-size: xxx-large;">Smart Cook</router-link></li>
                    <li style="font-size: x-large;">Admin</li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <Link @click="home" class="btn btn-primary">Home</Link>

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
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },

  methods: {

    getImage() {
    return '../assets/images/logo.PNG';
    },

    home() {
        Inertia.get(route('home.index'));
    }

  }
}
</script>
