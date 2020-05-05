<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form v-on:submit="authenticate()">
                        <div class="card-header">{{ $t('login.title') }}</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ $t('login.input_text.email') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" v-model="user.email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('login.input_text.password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" v-model="user.password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary">
                                        {{ $t('login.buttons.login') }}
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
            axios.get('/api/logout')
                .then(function(res) {
                    
                })
                .catch(function(err) {
                    if(err.response.status) {
                        alert(err.response.data.error);
                    } 
                });
        },
        data: function () {
            return {
                user: {
                    email: '',
                    password: '',
                },
                errors: []
            }
        },
        methods: {
            authenticate() {
                var self = this;
                var user = self.user;

                // if(this.validateEmpty(user) && this.error.length > 0) {
                //     alert(this.error.join("\n"));
                //     return false;
                // }

                axios.post('/api/authenticate', user)
                    .then(function(res) {
                        self.$router.push('/dashboard');
                    })
                    .catch(function(err) {
                        if(err.response.status) {
                            console.log(err.response);
                            switch(err.response.status) {
                                case 422:
                                    if(err.response.data.errors) {
                                        self.validateForm(err.response.data.errors);
                                        alert(self.errors.join("\n"));
                                    }
                                    break;
                                case 401:
                                    alert(err.response.data.error);
                                    break;
                                default:
                                    console.log("Undefined");
                                    break;
                            }
                        } 
                        self.errors = [];
                    });
            },
            // validateEmpty(user, self) {

            //     if(!user.email || ) {
            //         this.error.push(this.$t("login.errors.email"));
            //     }

            //     if(!user.password) {
            //         this.error.push(this.$t("login.errors.password"));
            //     }

            // }
            validateForm(errors) {
                var self = this;
                for(var error in errors) {
                    for(var msg in errors[error]) {
                        switch(errors[error][msg]) {
                            case 'email_invalid':
                                self.errors.push(self.$t('login.errors.email_invalid'));
                                break;
                            case 'email_required':
                                self.errors.push(self.$t('login.errors.email_required'));
                                break;
                            case 'password_invalid':
                                self.errors.push(self.$t('login.errors.password_invalid'));
                                break;
                            case 'password_incorrect':
                                self.errors.push(self.$t('login.errors.password_incorrect'));
                                break;
                            case 'password_required':
                                self.errors.push(self.$t('login.errors.password_required'));
                                break;
                        }
                    }
                }
            }
        }
    }
</script>
