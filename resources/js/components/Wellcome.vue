<template>
<div id="app">
  <v-app>
    <v-app-bar
      app
      color="white"
      height="100"
    >




        <v-toolbar-title class="font-weight-black headline teal--text accent-2">
            <v-card flat tile class="d-flex">
             <v-img
          contain
          height="90px"
          alt="logo"
          src="assets/logo_large.png"
        ></v-img>
            </v-card>
        </v-toolbar-title>
        <v-spacer />
        <v-btn text small @click="$vuetify.goTo('#features')">Tratamientos</v-btn>
        <v-btn text small @click="$vuetify.goTo('#contact')">Contacto</v-btn>
        <!-- <v-btn v-if="!isLoggedIn" icon v-on:click="login">
            <v-icon>mdi-account</v-icon>
        </v-btn>
        <v-btn v-else icon :to="{name: 'dash'}">
            <v-icon>desktop_windows</v-icon>
        </v-btn> -->

    </v-app-bar>

    <router-view :key="$route.fullPath"></router-view>

    <v-footer
      class="justify-center"
      color="#292929"
      height="100"
    >




      <div class="caption font-weight-light grey--text text--lighten-1 text-center">
        &copy; {{ (new Date()).getFullYear() }} — Centro de fisioterapia Sanaval SL. Av de Betanzos, 10 Posterior 28029 Madrid.
      </div>
    </v-footer>
  </v-app>
 </div>
</template>
<script>
import {mapGetters} from 'vuex';
	export default {
        computed:{
            ...mapGetters([
				'isLoggedIn'
            ]),
            computedColorTitulo(){
                if (this.empresa.img1 == null)
                    return "black--text";
                else
                    return "white--text";
            }
        },
        data: () => ({
            bottomNav: 'recent',
            alert: true,
            legal: false,
            empresa: {},
            parametros:{},

        }),
        beforeMount(){
            axios.get('api/param')
                .then(res => {
                    this.parametros = res.data.parametros;

                })
                 .catch(err => {
                    this.$toast.error("Fallo en reload empresa...");
                })
                 .finally(()=> {
                        this.show_loading = false;
                });
        },
	}
</script>
