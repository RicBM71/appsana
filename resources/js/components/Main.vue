<template>
    <v-row
        align="center"
        justify="center"
        >
        <v-col
          cols="12"
          md="2"
        >
            <v-btn rounded block large color="grey" class="blue-grey lighten-3" @click="goFindCompra()">
                Últimas citas
                <v-icon right dark>date_range</v-icon>
            </v-btn>
        </v-col>
        <v-col
          cols="12"
          md="2"
        >
            <v-btn rounded block large color="grey" class="blue-grey lighten-3" @click="goFindCompra()">
                Recibos
                <v-icon right dark>account_balance</v-icon>
            </v-btn>
        </v-col>
        <v-col
          cols="12"
          md="2"
        >
            <v-btn rounded block large color="grey" class="blue-grey lighten-3" @click="goFindCompra()">
                Bono
                <v-icon right dark>chrome_reader_mode</v-icon>
            </v-btn>
        </v-col>
    </v-row>
</template>
<script>
import {mapActions} from "vuex";
import {mapGetters} from 'vuex';
export default {
    computed:{
        ...mapGetters([
            'isLoggedIn',
            'imgFondo'
		]),
    },
    data: () => ({
        logo: ""
    }),
    mounted(){
        console.log('dash');
        axios.get('/dash')
            .then(res => {

                this.setAuthUser(res.data.user);

                //this.logo = "/storage/logos/"+this.empresaActiva+".png";
                this.logo = this.imgFondo;
            })
            .catch(err => {
                console.log(err);
        })

    },
    methods:{
        ...mapActions([
				'setAuthUser'
            ]),
        goFindCompra(){
            this.$router.push({ name: 'compra.index' })
        },
    },

  }
</script>
