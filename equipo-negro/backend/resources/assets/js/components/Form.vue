<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form @submit.prevent="addresultado">
                    <div class="form-group">
                        <label for="">Coordenadas</label>
                        <input type="text" class="form-control" id="" placeholder="Name of resultado" v-model="resultadoData.coords">
                        <span class="text-danger">{{errors.coords?errors.coords[0]:""}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" v-model="resultadoData.name">
                        <span class="text-danger">{{errors.name?errors.name[0]:""}}</span>

                    </div>

                    <div class="form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control" id="" placeholder="Name of resultado" v-model="resultadoData.state">
                        <span class="text-danger">{{errors.state?errors.state[0]:""}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" v-model="resultadoData.link">
                        <span class="text-danger">{{errors.link?errors.link[0]:""}}</span>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            resultadoData:{
                name:'',
                body:''
            },

            errors:{}

            }

        },
        methods:{
            addresultado(){
                axios.put('/resultados',this.resultadoData)
                .then(response=>{
                    this.resultadoData="";
                    this.errors="";
                    this.$router.push('/');
                })
                .catch(error=>{
                    this.errors=error.response.data;
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
