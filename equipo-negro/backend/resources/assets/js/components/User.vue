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
                <div class="panel panel-default" v-for='user in users'>
                    <div @click="deleteIt(user.id)" class="btn pull-right"><i class="fa fa-times"></i></div>
                    <div @click="editIt(user.id)" class="btn pull-right"><i class="fa fa-pencil"></i></div>
                    <form @submit.prevent="updateIt(user.id)">
                        <div class="panel-heading">
                            <strong v-show="!showIt(user.id)">{{user.name}}</strong>
                            <input style="width:200px" v-show="showIt(user.id)" type="text" class="form-control"
                                   v-model="userEditData.nombredeusers">
                        </div>


                        <button class="btn btn-primary" type="submit" v-show="showIt(user.id)">Ok</button>
                        <button class="btn btn-default" @click.prevent="editForm=false" v-show="showIt(user.id)">
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
                users: [],
                loading: false,
                editForm: "",
                userEditData: {nombredeusers: '', body: ''},
                token: localStorage.getItem('token')
            }
        },
        methods: {
            editIt(userId){
                this.users.forEach((user, i) => {
                    if (user.id == userId) {
                        this.userEditData = user;
                    }
                });

                return this.editForm = userId;
            },
            showIt(userId){
                if (this.editForm == userId) {
                    return true;
                }
                return false;
            },
            updateIt(userId){
                axios.put('/users/' + userId, this.userEditData)
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
            deleteIt(userId){
                let ok = confirm("are you sure?");
                if (ok) {
                    axios.delete('/users/' + userId).then(response => {
                        console.log(response);
                        this.fetchIt();
                    });
                }
            },
            fetchIt(){
                this.loading = true;
                axios.get('users/').then((response) => {
                    this.users = response.data;
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
