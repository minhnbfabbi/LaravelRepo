<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form v-on:submit="authenticate()">
                        <div class="card-header">Login Page</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" v-model="user.email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" v-model="user.password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                user: {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            authenticate() {
                var self = this;
                var user = self.user;
                axios.post('/api/authenticate', user)
                    .then(function(res) {
                        self.$router.push({ name: 'Dashboard', query: { redirect: '/dashboard' } });
                    })
                    .catch(function(err) {
                        console.log(err);
                    });
            }
        }
    }
</script>
