<template>
    <div class="container">
        <div class="row pull-right">
            <!-- <router-link to="/create">
                <a class="btn btn-primary">Crear Articulo</a>
            </router-link> -->
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div v-if="loading">Loading...</div>
                <div class="panel panel-default" v-for='resultado in resultados'>
                    <div @click="deleteIt(resultado.id)" class="btn pull-right"><i class="fa fa-times"></i></div>
                    <div @click="editIt(resultado.id)" class="btn pull-right"><i class="fa fa-pencil"></i></div>
                    <form @submit.prevent="updateIt(resultado.id)">
                        <div class="panel-heading">
                            <label>Coordenadas : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.coords}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.coords">
                        </div>
                        <div class="panel-heading">
                            <label>Direccion : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.name}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.name">
                        </div>
                        <div class="panel-heading">
                            <label>Estado (pendiente, aprobado, rechazado) : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.state}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.state">
                        </div>
                        <div class="panel-heading">
                            <label>Link : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.link}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.link">
                        </div>



                        <div class="panel-heading">
                            <label>Nombre opcion 1: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.nameopcionuno}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.nameopcionuno">
                        </div>
                        <div class="panel-heading">
                            <label>Descripcion opcion 1: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.descripcionopcionuno}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.descripcionopcionuno">
                        </div>

                        <div class="panel-heading">
                            <label>Probabilidades opcion 1: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.probabilidadesopcionuno}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.probabilidadesopcionuno">
                        </div>


                        <div class="panel-heading">
                            <label>Nombre opcion 2: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.nameopciondos}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.nameopciondos">
                        </div>

                        <div class="panel-heading">
                            <label>Descripcion opcion 2: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.descripcionopciondos}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.descripcionopciondos">
                        </div>

                        <div class="panel-heading">
                            <label>Probabilidades opcion 2: </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.probabilidadesopciondos}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.probabilidadesopciondos">
                        </div>



                        <div class="panel-heading">
                            <label>Nombre opcion correcta : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.nombreopcioncorrecta}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.nombreopcioncorrecta">
                        </div>
                        <div class="panel-heading">
                            <label>Descripcion opcion correcta : </label>
                            <div v-show="!showIt(resultado.id)">{{resultado.descripcionopcioncorrecta}}</div>
                            <input style="width:200px" v-show="showIt(resultado.id)" type="text" class="form-control"
                                   v-model="resultadoEditData.descripcionopcioncorrecta">
                        </div>


                        <button class="btn btn-primary" type="submit" v-show="showIt(resultado.id)">Ok</button>
                        <button class="btn btn-default" @click.prevent="editForm=false" v-show="showIt(resultado.id)">
                            Cancel
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                resultados: [],
                loading: false,
                editForm: "",
                resultadoEditData: {coords: '', name: '', state: '', link: '', nameopcionuno: '' ,descripcionopcionuno: '' ,probabilidadesopcionuno: '' ,nameopciondos: '' ,descripcionopciondos: '' ,probabilidadesopciondos: '' ,nombreopcioncorrecta: '' ,descripcionopcioncorrecta: ''},
                token: localStorage.getItem('token')
            }
        },
        methods: {
            editIt(resultadoId){
                this.resultados.forEach((resultado, i) => {
                    if (resultado.id == resultadoId) {
                        this.resultadoEditData = resultado;
                    }
                });

                return this.editForm = resultadoId;
            },
            showIt(resultadoId){
                if (this.editForm == resultadoId) {
                    return true;
                }
                return false;
            },
            updateIt(resultadoId){
                axios.put('/resultados/' + resultadoId, this.resultadoEditData)
                    .then(response => {
                        console.log(response);
                        this.editForm = false;
                        this.notebookEditData = "";
                        this.$router.push('/');
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            },
            deleteIt(resultadoId){
                let ok = confirm("are you sure?");
                if (ok) {
                    axios.delete('/resultados/' + resultadoId).then(response => {
                        console.log(response);
                        this.fetchIt();
                    });
                }
            },
            fetchIt(){
                this.loading = true;
                axios.get('resultados/').then((response) => {
                    this.resultados = response.data;
                    this.loading = false
                });
            }
        },
        mounted() {
            console.log(this.token);
            this.fetchIt();

        }
    }
</script>
