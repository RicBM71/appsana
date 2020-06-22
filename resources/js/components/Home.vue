<template>
    <v-app id="inspire" v-if="isLoggedIn">
        <loading :show_loading="show_loading"></loading>
        <v-navigation-drawer
        v-model="drawer"
        app
        >
        <!-- <v-list dense>
            <v-list-item link>
            <v-list-item-action>
                <v-icon>mdi-home</v-icon>
            </v-list-item-action>
            <v-list-item-content>
                <v-list-item-title>Home</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
            <v-list-item link>
            <v-list-item-action>
                <v-icon>mdi-contact-mail</v-icon>
            </v-list-item-action>
            <v-list-item-content>
                <v-list-item-title>Contact</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </v-list> -->
        </v-navigation-drawer>

        <v-app-bar
        app
        color="blue darken-3"
        dark
        >
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Sanaval</v-toolbar-title>
        <v-spacer></v-spacer>
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                        <v-btn v-on="on" icon v-show="jobs > 0">
                            <v-icon color="red darken-4">notification_important</v-icon>
                        </v-btn>
                    </template>
                    <span>({{jobs}}) Mails pendientes de envio.</span>
                </v-tooltip>


                <v-btn icon v-on:click="home">
                    <v-icon>home</v-icon>
                </v-btn>
                <v-btn icon v-on:click="passwd">
                    <v-avatar v-if="user.avatar !='#'" size="32px">
                        <img class="img-fluid" :src="user.avatar">
                    </v-avatar>
                    <v-icon v-else>settings</v-icon>
                </v-btn>
                <strong v-html="user.name"></strong>
                <v-btn icon large  v-on:click="Logout">
                    <v-avatar size="32px" tile>
                        <v-icon>exit_to_app</v-icon>
                    </v-avatar>
                </v-btn>
        </v-app-bar>

        <v-content>
        <v-container
            fluid        >
            <router-view :key="$route.fullPath"></router-view>
        </v-container>
        </v-content>
    </v-app>
    <!-- <v-app>
        <loading :show_loading="show_loading"></loading>

        <div v-if="isLoggedIn">

            <v-toolbar
                v-if="menu"
                :clipped-left="$vuetify.breakpoint.lgAndUp"
                color="blue darken-3"
                dark
                app
                fixed
                >
                <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
                    <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                    <span class="hidden-sm-and-down">{{ this.user.empresa_nombre }}</span>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                        <v-btn v-on="on" icon v-show="jobs > 0">
                            <v-icon color="red darken-4">notification_important</v-icon>
                        </v-btn>
                    </template>
                    <span>({{jobs}}) Mails pendientes de envio.</span>
                </v-tooltip>


                <v-btn icon v-on:click="home">
                    <v-icon>home</v-icon>
                </v-btn>
                <v-btn icon v-on:click="passwd">
                    <v-avatar v-if="user.avatar !='#'" size="32px">
                        <img class="img-fluid" :src="user.avatar">
                    </v-avatar>
                    <v-icon v-else>settings</v-icon>
                </v-btn>
                <strong v-html="user.name"></strong>
                <v-btn icon large  v-on:click="Logout">
                    <v-avatar size="32px" tile>
                        <v-icon>exit_to_app</v-icon>
                    </v-avatar>
                </v-btn>
                </v-toolbar>
            <v-content>


            <router-view :key="$route.fullPath"></router-view>


            </v-content>
        </div>
</v-app> -->
</template>
<script>
import {mapActions} from "vuex";
import {mapState} from 'vuex'
import {mapGetters} from 'vuex';
import Loading from '@/components/shared/Loading'
export default {
    components: {
        'loading': Loading,
    },
    computed:{
        ...mapState({
            user: state => state.auth
        }),
        ...mapGetters([
            'isLoggedIn',
            'isRoot',
            'isAdmin',
            'hasFactura',
            'isGestor',
            'isSupervisor',
            'empresaActiva',
            'hasLiquidar'
		]),
    },
    data: () => ({
        menu: true,
        dialog: false,
        drawer: false,
        show: true,

        empresaTxt:"...",
        empresas:[],
        myEmpresa:false,
        empresa_id:0,
        jobs: 0,
        show_loading:  false,
        //productos_online: 0,

        // user: {
        //     name : ""
        // },

        mn_root: {
            icon: 'keyboard_arrow_up',
            'icon-alt': 'keyboard_arrow_down',
            text: 'Root',
            model: false,
            children: [
                { text: 'Find Producto', name: 'tools.find.producto' },
                { text: 'Importar Producto', name: 'tools.importar.producto' },
                { text: 'Usuarios', name: 'users.index' },
                { text: 'Roles', name: 'roles' },
                { text: 'Grupos', name: 'grupo.index' },
                { text: 'Clases', name: 'clase.index' },
                { text: 'Tipos de Iva', name: 'iva.index' },
                { text: 'Motivos Devolución', name: 'motivo.index' },
                { text: 'Cruces Caja', name: 'cruce.index' },
                { text: 'Cierre', name: 'tools.cierre' },
                { text: 'Parámetros', name: 'parametro.edit' },
            ]
        },

        mn_admin: {
            icon: 'keyboard_arrow_up',
            'icon-alt': 'keyboard_arrow_down',
            text: 'Administración',
            model: false,
            children: [
                { icon: 'supervised_user_circle', text: 'Usuarios', name: 'users.index' },
                { icon: 'language', text: 'Empresas', name: 'empresa.index' },
                { icon: 'event_seat', text: 'Ubicaciones', name: 'almacen.index' },
            ]
        },

        mn_procesos:{
            icon: 'keyboard_arrow_up',
            'icon-alt': 'keyboard_arrow_down',
            text: 'Procesos',
            model: false,
            children: [
                { icon: 'lock', text: 'Facturar Recuperaciones', name:'facturacion.compras' },
                { icon: 'lock', text: 'Facturar Albaranes', name:'facturacion.albaranes' },
                { text: 'Reubicar Albaranes', name: 'reubicar', icon: 'shuffle'},
                { icon: 'fireplace', text: 'Liquidar Lotes', name:'liquidar.index' },
                { icon: 'compare_arrows', text: 'Intercambio de Operaciones', name:'intercambio' },
            ]
        },

        mn_items: [
            { icon: 'people', text: 'Clientes', name:'cliente.index' },
            { icon: 'local_offer', text: 'Productos', name:'producto.index' },

        ],



        //  mn_consultas:{
        //     icon: 'keyboard_arrow_up',
        //     'icon-alt': 'keyboard_arrow_down',
        //     text: 'Consultas I',
        //     model: false,
        //     children: [
        //         { icon: 'forward', text: 'Balance por empresa', name:'exportar.balance' },
        //         { icon: 'forward', text: 'Operaciones por empresa', name:'exportar.operaciones' },
        //         { icon: 'forward', text: 'Cuadro de Mando', name:'exportar.mando' },
        //         { icon: 'forward', text: 'Resumen por concepto', name:'exportar.situacion' },
        //         { icon: 'forward', text: 'Resumen Contable', name:'exportar.resconta' },
        //         { icon: 'forward', text: 'Detalle de compras', name:'exportar.detacom' },
        //         { icon: 'forward', text: 'Detalle de ventas', name:'exportar.detaven' },
        //         { icon: 'forward', text: 'Servicios Taller', name:'exportar.service' },
        //         { icon: 'forward', text: 'Liquidados', name:'exportar.liquidados' },
        //         { icon: 'home_work', text: 'Ventas en depósito', name:'exportar.vendepo' },
        //     ],
        // },

        //  mn_consultas2:{
        //     icon: 'keyboard_arrow_up',
        //     'icon-alt': 'keyboard_arrow_down',
        //     text: 'Consultas II',
        //     model: false,
        //     children: [
        //         { text: 'Metal en Depósito', name: 'exportar.metdep', icon: 'print'},
        //         { text: 'Apuntes por banco', name: 'exportar.apuban', icon: 'account_balance'},
        //         { text: 'Relación facturas recuperacion', name: 'facturacion.lisfacom', icon: 'print'},
        //         { text: 'Relación facturas de venta', name: 'facturacion.lisfaven', icon: 'print'},
        //         { icon: 'forward', text: 'Inventario', name:'exportar.inventario' },
        //         { icon: 'archive', text: 'Mod. 347', name:'exportar.mod347' },
        //         { icon: 'menu_book', text: 'Imprimir Libro', name:'exportar.libro' },
        //         { icon: 'check_circle_outline', text: 'Check Contadores', name:'contador.check' },
        //     ],
        // },

        expired: false,
    }),
    mounted(){

        axios.get('/dash')
                .then(res => {

                    console.log(res);
                   this.setAuthUser(res.data.user);

                    this.mn_items.push(this.mn_procesos);

                    this.mn_items.push(this.mn_root);

                    this.jobs = res.data.jobs;

                    this.expired = res.data.expired;
                    if (this.expired){
                        this.$toast.error('Password ha Expirado, debe reemplazarla');
                        this.$router.push({name: 'edit.password'});
                    }

                })
                .catch(err => {

                    this.show = false;
                    if (err.request.status == 401){ // fallo de validated.
                        //this.$router.push("/login");
                        window.location = '/login';
                    }
                })

    },

    methods:{
        ...mapActions([
                'setAuthUser',
                'unsetParametros'
			]),
        abrir(name){
            //this.drawer = false;
            this.$router.push({name: name});
        },
        home(){
            axios.get('/dash')
                .then(res => {

                    this.setAuthUser(res.data.user);

                    this.empresa_id = this.user.empresa_id;
                    this.empresas = res.data.user.empresas;
                    this.empresas.sort(function (a, b) {
                    if (a.text > b.text) {
                        return 1;
                    }
                    if (a.text < b.text) {
                        return -1;
                    }
                    // a must be equal to b
                    return 0;
                    });
                    //this.empresas = res.data.user.empresas.sortBy('text');
                    var idx = this.empresas.map(x => x.value).indexOf(this.empresa_id);

                    this.empresaTxt = this.empresas[idx].text;

                    this.jobs = res.data.jobs;

                    // res.data.user.empresas.map((e) =>{
                    //     if (e.value == this.empresa_id)
                    //         this.empresaTxt = e.text;
                    //     this.empresas.push({id: e.id, name: e.titulo});
                    // })

                    this.expired = res.data.expired;
                    if (this.expired){
                        this.$toast.error('Password ha Expirado, debe reemplazarla');
                        this.$router.push({name: 'edit.password'});
                    }

                })
                .catch(err => {
                    this.show = false;
                    if (err.request.status == 401){ // fallo de validated.
                        window.location = '/login';
                    }
                })

            this.$router.push({name: 'dash'});
        },
        passwd(){
            this.$router.push({name: 'edit.password'});
        },
        empresa(){
            this.empresa_id = this.empresaActiva;
            this.myEmpresa=true;
        },
        getReloadEmpresa(){
            this.show_loading = true;
            axios.get('/dash')
                .then(res => {

                    this.setAuthUser(res.data.user);
                    var idx = this.empresas.map(x => x.value).indexOf(this.empresa_id);
                    this.empresaTxt = this.empresas[idx].text;
                    if (this.$route.path != '/home')
                        this.$router.push({name: 'dash'});
                })
                .catch(err => {
                    this.$toast.error("Fallo en reload empresa...");
                })
                 .finally(()=> {
                        this.show_loading = false;
                });
        },
        setEmpresa(){

            this.show_loading = true;
            this.empresas.map((e) =>{
                   if (e.id == this.empresa_id)
                        this.empresaTxt = e.name;
                });

            axios({
                    method: 'put',
                    url: '/admin/users/'+this.user.id+'/empresa',
                    data:{ empresa_id: this.empresa_id }
                })
                .then(res => {
                    //this.$toast.success("Cambiando de empresa...");
                   // this.setAuthUser(res.data.user);

                    this.getReloadEmpresa();
                   // this.$router.push({name: 'dash'});
                })
                .catch(err => {
                    this.$toast.error("No se ha podido seleccionar la empresa");
                });

            this.myEmpresa=false;
        },
        Logout() {
            this.$toast.success('Logout, espere...');
            axios.post('/logout').then(res => {

                this.$store.dispatch('unsetAuthUser')
                this.$router.push({name: 'index'});
			})
        },
    }
  }
</script>
