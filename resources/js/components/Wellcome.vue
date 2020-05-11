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
            items: [
                {
                    src: 'assets/diap3.jpg',
                },
                {
                    src: 'assets/diap1b.jpg',
                },
                {
                    src: 'assets/diap2.jpg',
                },
                {
                    src: 'assets/diap5.jpg',
                },
                {
                    src: 'assets/diap4.jpg',
                },
                {
                    src: 'assets/diap6.jpg',
                },
            ],
            diapositivas: [
                {
                    src: 'assets/diap1c.jpg',
                    text: "Extremar al máximo la higiene de manos con agua y jabón o gel hidroalcólico. Te proporcionaremos gel hidroalcólico a la entrada.",
                },
                {
                    src: 'assets/diap2c.jpg',
                    text: "Es importante acudir al centro con mascarilla. Disponemos de mascarillas quirúrgicas para nuestros pacientes.",
                },
                {
                    src: 'assets/diap3c.jpg',
                    text: "Abstenerse de acudir al centro si presentas fiebre, tos... contacta con los servicios de atención primaria.",
                },
                {
                    src: 'assets/diap4c.jpg',
                    text: "Hemos reforzado los procedimientos de higiene y desinfección como medida de prevención.",
                },
                {
                    src: 'assets/diap5c.jpg',
                    text: "Todo nuestro personal dispone del equipamiento necesario para garantizar tu seguridad y la suya propia.",
                },
                {
                    src: 'assets/diap6c.jpg',
                    text: "No están permitidas las aglomeraciones. Solo se permite un acompañante en caso de necesidad.",
                },
             ],
            articles: [
                {
                    src: 'assets/gallery-05-370x240.jpg',
                    title: 'Tratamientos',
                    text: "Disponemos esencialmente de dos tipos de tramiento: uno combinado terapia + aparatología adaptada a tu lesión: microonda, corrientes, magnetoterapia, láser, etc. y otro únicamente manual. Siempre la base fundamental de nuestros tratamientos es la terapia manual. Nuestros fisioterapeutas darán respuesta y te orientarán acerca del tratamiento más adecuado para ti.",
                },
                {
                    src: 'assets/gallery/gallery-07-370x240.jpg',
                    title: 'Exclusividad',
                    text: "Todas las patologías requieren de un tiempo de recuperación y este va a depender de cada persona, de su trabajo, de su edad, muchos factores que van a influir decisivamente en cada persona. Nosotros solo te podemos garantizar nuestra absoluta entrega para tu rehabilitación. Todos nuestros tratamientos se adaptan individualmente a cada paciente, de acuerdo a su patología y a su edad."
                },
                {
                    src: 'assets/gallery/gallery-03-370x240.jpg',
                    title: 'Nuestros Mayores',
                    text: 'Queremos incidir especialmente en el factor de la edad porque consideramos un pilar fundamental de nuestra actividad el tratamiento a nuestros mayores, que en muchas ocasiones no obtienen respuestas a sus dolencias. Hay hay muchas soluciones adaptadas a personas mayores que mejorarán considerablemente su calidad de vida. Disponemos de precios especiales para mayores de 65 años.',
                },
                ],
                features: [
                {
                    icon: 'mdi-account-star',
                    title: 'Tú eres nuestra razón de ser',
                    text: 'Desde el año 2001, hemos entendido la fisioterapia como el medio para ayudar la comunidad, de forma comprometida, personalizada y adaptada a tu patología. Nos esforzamos y damos lo mejor de nostros mismos para que tu recuperación sea un hecho. Cuéntanos tu problema y nos comprometos a buscar la mejor solución a tu recuperación.',
                },
                {
                    icon: 'mdi-update',
                    title: 'Nuestros tratamientos',
                    text: 'En nuestro centro ofrecemos como norma general un tratamiento combinado, en primer lugar y como pilar fundamental la terapia manual, en el que un fisioterapeuta te valorará y te indicará las pautas de tu tratamiento. Complementario a la terapia manual, disponemos de equipos de electroterapia, magnetoterapia, láser, microonda, presoterapia, etc. ',
                },
                {
                    icon: 'mdi-account-group-outline',
                    title: 'Nuestro equipo',
                    text: 'Nuestro centro se compone de un equipo de fisioterapeutas altamente cualificados y están dispuestos a escucharte y dispensar el tratamiento más adecuado a tu patología. No hay soluciones milagrosas, la fisioterapia requiere de esfuerzo y compromiso por parte del fisioterapueta pero es fundamental la colaboración del paciente. Nosotros estamos dispuestos.',
                },
            ],
            stats: [
                ['+19 Años', 'Actividad'],
                ['+7000', 'Pacientes tratados'],
                ['1º', 'Tú eres lo primero'],
                ['+65', 'Descuentos a mayores'],
            ],

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
        methods:{
            showLegal(){
              this.alert = false;
              this.legal = true;
            },
            closeLegal(){
              this.legal = false;
            },
            login(){
                window.location = '/login';
            },
            goMaps(){
                window.open('https://www.google.com/maps/place/Fisioterapia+Sanaval/@40.4749474,-3.7136945,17z/data=!4m12!1m6!3m5!1s0xd4229a297a7c8d7:0xa386654cca9e938a!2sFisioterapia+Sanaval!8m2!3d40.4728556!4d-3.711619!3m4!1s0xd4229a297a7c8d7:0xa386654cca9e938a!8m2!3d40.4728556!4d-3.711619');
            }
        }
	}
</script>
