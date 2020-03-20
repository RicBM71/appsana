<template>
<div id="app">
  <v-app>
    <v-app-bar
      app
      color="white"
      height="100"
    >
      <v-avatar
        class="mr-3"

        size="70"
      >
        <v-img
          contain
          max-height="70%"
          src="assets/logo.png"
        ></v-img>
      </v-avatar>

        <v-toolbar-title class="font-weight-black headline teal--text accent-2">
            Centro de fisioterapia Sanaval
        </v-toolbar-title>
        <!-- <v-spacer />
        <v-btn v-if="!isLoggedIn" icon v-on:click="login">
            <v-icon>mdi-account</v-icon>
        </v-btn>
        <v-btn v-else icon :to="{name: 'dash'}">
            <v-icon>desktop_windows</v-icon>
        </v-btn> -->
    </v-app-bar>

    <v-content>
      <section id="hero">
        <v-row no-gutters>
          <v-img
            :min-height="'calc(100vh - ' + $vuetify.application.top + 'px)'"
            src="assets/services-01-870x440.jpg"
          >
            <v-theme-provider dark>
              <v-container fill-height>
                <v-row
                  align="center"
                  class="purple--text mx-auto"
                  justify="center"
                >
                  <v-col
                    class="purple--text text-center"
                    cols="12"
                    tag="h1"
                  >
                    <span
                      class="font-weight-light"
                      :class="[$vuetify.breakpoint.smAndDown ? 'display-1' : 'display-2']"
                    >
                      Bienvenid@ a Sanaval
                    </span>

                    <br>

                    <span
                      :class="[$vuetify.breakpoint.smAndDown ? 'display-3': 'display-4']"
                      class="font-weight-ligth"
                    >
                      tu centro de fisioterapia
                    </span>

                  </v-col>

                  <v-btn
                    class="align-self-end purple--text"
                    fab
                    outlined
                    @click="$vuetify.goTo('#about-me')"
                  >
                    <v-icon>mdi-chevron-double-down</v-icon>
                  </v-btn>
                </v-row>
              </v-container>
            </v-theme-provider>
          </v-img>
        </v-row>
      </section>

      <section id="about-me">
        <div class="py-12"></div>

        <v-container class="text-center">
          <h2 class="display-2 font-weight-bold red--text darken-4 mb-3">AVISO IMPORTANTE</h2>

          <v-responsive
            class="mx-auto mb-8"
            width="56"
          >
            <v-divider class="mb-1"></v-divider>

            <v-divider></v-divider>
          </v-responsive>

          <v-responsive
            class="mx-auto title font-weight-light mb-8 text-justify"
            max-width="920"
          >
            <p>El Centro de fisioterapia Sanaval, en el marco de las medidas de prevención y contención necesarias para la vigilancia y control en materia de salud pública de cara a la situación y evolución del coronavirus (COVID-19), hemos decidido suspender la actividad en nuestro centro.</p>
            <br/>
            <p>Con el fin de dar repuesta a cualquier duda podéis contactar con nosotros en el teléfono <span class="font-weight-bold">91 739 87 08</span>, por WhatsApp <span class="font-weight-bold">634 234 815</span>, o por email <span class="font-weight-bold">info@sanaval.com</span></p>
            <br />
            <p>Te recordamos que es muy importante:</p>
                <p><span class="font-weight-bold">#LavarseLasManos</span> con frecuencia.</p>
                <p><span class="font-weight-bold">#QuedarseEnCasa</span> y reducir el contacto social.</p>
                <p><span class="font-weight-bold">#YoMeMuevoEnCasa</span>, mantener la actividad física.</p>
            <p>Lamentamos las molestias ocasionadas y gracias por confiar en nosotros.</p>
          </v-responsive>

          <v-avatar
            class="elevation-12 mb-12"
            size="128"
          >
            <v-img src="assets/sara-110x110.jpg"></v-img>
          </v-avatar>
            <p>Sara Veiga Sánchez - Fisioterapeuta</p>
          <div></div>

          <!-- <v-btn
            color="grey"
            href="https://vuetifyjs.com"
            outlined
            large
          >
            <span class="grey--text text--darken-1 font-weight-bold">
              Vuetify Documentation
            </span>
          </v-btn> -->
        </v-container>

        <div class="py-12"></div>
      </section>

      <section
        id="features"
        class="grey lighten-3"
      >
        <div class="py-12"></div>

        <v-container class="text-center">
          <h2 class="display-2 font-weight-bold mb-3">NUESTRO CENTRO</h2>

          <v-responsive
            class="mx-auto mb-12"
            width="56"
          >
            <v-divider class="mb-1"></v-divider>

            <v-divider></v-divider>
          </v-responsive>

          <v-row>
            <v-col
              v-for="({ icon, title, text }, i) in features"
              :key="i"
              cols="12"
              md="4"
            >
              <v-card
                class="py-12 px-4"
                color="grey lighten-5"
                flat
              >
                <v-theme-provider dark>
                  <div>
                    <v-avatar
                      color="primary"
                      size="88"
                    >
                      <v-icon
                        large
                        v-text="icon"
                      ></v-icon>
                    </v-avatar>
                  </div>
                </v-theme-provider>

                <v-card-title
                  class="justify-center font-weight-black text-uppercase"
                  v-text="title"
                ></v-card-title>

                <v-card-text
                  class="subtitle-1"
                  v-text="text"
                >
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-container>

        <div class="py-12"></div>
      </section>

      <section id="stats">
        <v-parallax
          :height="$vuetify.breakpoint.smAndDown ? 700 : 500"
          src="assets/background-03-1920x610.jpg"
        >
          <v-container fill-height>
            <v-row class="mx-auto">
              <v-col
                v-for="[value, title] of stats"
                :key="title"
                cols="12"
                md="3"
              >
                <div class="text-center">
                  <div
                    class="display-3 font-weight-black mb-4"
                    v-text="value"
                  ></div>

                  <div
                    class="title font-weight-regular text-uppercase"
                    v-text="title"
                  ></div>
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-parallax>
      </section>

      <!-- <section id="blog">
        <div class="py-12"></div>

        <v-container>
          <h2 class="display-2 font-weight-bold mb-3 text-uppercase text-center">Blog</h2>

          <v-responsive
            class="mx-auto mb-12"
            width="56"
          >
            <v-divider class="mb-1"></v-divider>

            <v-divider></v-divider>
          </v-responsive>

          <v-row>
            <v-col
              v-for="({ src, text, title }, i) in articles"
              :key="i"
              cols="12"
              md="4"
            >
              <v-img
                :src="src"
                class="mb-4"
                height="275"
                max-width="100%"
              ></v-img>

              <h3
                class="font-weight-black mb-4 text-uppercase"
                v-text="title"
              ></h3>

              <div
                class="title font-weight-light mb-5"
                v-text="text"
              ></div>

              <v-btn
                class="ml-n4 font-weight-black"
                text
              >
                Continue Reading
              </v-btn>
            </v-col>
          </v-row>
        </v-container>

        <div class="py-12"></div>
      </section> -->

      <v-sheet
        id="contact"
        color="#FFF"
        tag="section"
        tile
      >
        <div class="py-12"></div>

        <v-container>
          <h2 class="display-2 font-weight-bold mb-3 text-uppercase text-center black--text">Contacto</h2>

          <v-responsive
            class="mx-auto mb-12"
            width="56"
          >
            <v-divider class="mb-1"></v-divider>

            <v-divider></v-divider>
          </v-responsive>

          <v-row>
            <v-col cols="12" lg="4" md="6" sm="12">
                <v-card flat>
                    <h4 class="title font-weight-bold mb-3">Horario</h4>
                    <p>Lunes a Viernes de 10 a 14h y de 16:30 a 20:30</p>
                    <h4 class="subtitle-2 font-weight-bold mb-3">Solicita Cita Previa: </h4>
                    <v-row>
                      <v-col cols="10">
                        <h4 class="subtitle-2 font-weight-bold mb-3">
                          <v-icon class="purple--text">mdi-phone-classic</v-icon> 917398708
                        </h4>
                      </v-col>
                      <v-col cols="10">
                        <h4 class="subtitle-2 font-weight-bold mb-3">
                          <v-icon class="green--text">mdi-whatsapp</v-icon> WhatsApp 634234815
                        </h4>
                      </v-col>
                      <v-col cols="10">
                        <h4 class="subtitle-2 font-weight-bold mb-3">
                          <v-icon class="gray--text">mdi-email</v-icon> info@sanaval.com
                        </h4>
                      </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12">
                            <p class="caption font-italic font-weight-light red--text">* Suspendido temporalmente el servicio de citas online</p>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
            <v-col cols="8" lg="3" sm="8">
              <v-card flat>
                  <h4 class="title font-weight-bold mb-3">Dónde estamos</h4>
                  <div class="subtitle-2">Av de Betanzos, 10 Posterior</div>
                  <div class="subtitle-2">28029 Madrid</div>
                   <v-btn icon v-on:click="goMaps" flat>
                        <v-icon color="green" flat>mdi-google-maps</v-icon>
                    </v-btn>
                        Google Maps
                  <br/>
              </v-card>
            </v-col>
            <v-col cols="12" lg="3" sm="8">
                <v-card flat>
                    <h4 class="title font-weight-bold mb-3">Acreditados</h4>
                  <div class="subtitle-2">Profesionales Colegiados</div>
                  <div class="subtitle-2">Autorizado por la Consejería de Sanidad de la CCMM</div>
                  <br/>
                  <v-row>
                  <v-col cols="6" lg="3">
                    <v-img
                        contain
                        position="left center"
                        aspect-ratio="1"
                        src="assets/partner-02-150x135.png"
                    ></v-img>
                  </v-col>
                  <v-col cols="6" lg="3">
                     <v-img
                        contain
                        position="left center"
                        aspect-ratio="1"
                        src="assets/partner-01-150x79.png"
                    ></v-img>
                  </v-col>
                  </v-row>
              </v-card>
            </v-col>
        </v-row>



          <!-- <v-theme-provider light>
            <v-row>
              <v-col cols="12">
                <v-text-field
                  flat
                  label="Name*"
                  solo
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  flat
                  label="Email*"
                  solo
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  flat
                  label="Subject*"
                  solo
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-textarea
                  flat
                  label="Message*"
                  solo
                ></v-textarea>
              </v-col>

              <v-col
                class="mx-auto"
                cols="auto"
              >
                <v-btn
                  color="accent"
                  x-large
                >
                  Submit
                </v-btn>
              </v-col>
            </v-row>
          </v-theme-provider> -->
        </v-container>

        <div class="py-12"></div>
      </v-sheet>
    </v-content>

    <v-footer
      class="justify-center"
      color="#292929"
      height="100"
    >
      <div class="title font-weight-light grey--text text--lighten-1 text-center">
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
            empresa: {},
            articles: [
                {
                    src: 'https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
                    title: 'Mobile first & Responsive',
                    text: 'Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. Sed ornare ligula eget tortor tempor, quis porta tellus dictum.',
                },
                {
                    src: 'https://images.unsplash.com/photo-1475938476802-32a7e851dad1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80',
                    title: 'Think outside the box',
                    text: 'Nam ut leo ipsum. Maecenas pretium aliquam feugiat. Aenean vel tempor est, vitae tincidunt risus. Sed sodales vestibulum nibh.',
                },
                {
                    src: 'https://images.unsplash.com/photo-1416339442236-8ceb164046f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1892&q=80',
                    title: 'Small changes, big difference',
                    text: 'Vestibulum in dictum velit, in rhoncus nibh. Maecenas neque libero, interdum a dignissim in, aliquet vitae lectus. Phasellus lorem enim, luctus ut velit eget.',
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
                ['1º', 'Tú eres el primero'],
                ['+65', 'Descuentos a mayores'],
                ],

        }),
        beforeMount(){
            axios.get('api/emp')
                .then(res => {
                    this.empresa = res.data;
                })
                .catch(err => {
                    console.log(err);
            })
        },
        methods:{
            login(){
                window.location = '/login';
            },
            goMaps(){
                window.open('https://www.google.com/maps/place/Fisioterapia+Sanaval/@40.4749474,-3.7136945,17z/data=!4m12!1m6!3m5!1s0xd4229a297a7c8d7:0xa386654cca9e938a!2sFisioterapia+Sanaval!8m2!3d40.4728556!4d-3.711619!3m4!1s0xd4229a297a7c8d7:0xa386654cca9e938a!8m2!3d40.4728556!4d-3.711619');
            }
        }
	}
</script>
