<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $t('register.title') }}</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="register()">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ $t('register.input_text.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="user.name"  required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ $t('register.input_text.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="user.email" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('register.input_text.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" required autocomplete="new-password" v-model="user.password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('register.input_text.password_confirmation') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" required autocomplete="new-password" v-model="user.password_confirmation">
                                </div>
                            </div>
<!--                             <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="user.password_confirmation">
                                </div>
                            </div> -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary">
                                        {{ $t('register.buttons.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: []
            }
        },
        methods: {
            register() {
                var self = this;
                var user = self.user;
                axios.post('/api/register', user)
                    .then(function(res) {
                        alert(self.$t('register.messages.register_success'));
                        self.$router.push('/login');
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
            validateForm(errors) {
                var self = this;
                for(var error in errors) {
                    for(var msg in errors[error]) {
                        switch(errors[error][msg]) {
                            case 'email_invalid':
                                self.errors.push(self.$t('common.form_validation.errors.email_invalid'));
                                break;
                            case 'email_required':
                                self.errors.push(self.$t('common.form_validation.errors.email_required'));
                                break;
                            case 'email_unique':
                                self.errors.push(self.$t('common.form_validation.errors.email_unique'));
                                break;
                            case 'password_invalid':
                                self.errors.push(self.$t('common.form_validation.errors.password_invalid'));
                                break;
                            case 'password_incorrect':
                                self.errors.push(self.$t('common.form_validation.errors.password_incorrect'));
                                break;
                            case 'password_required':
                                self.errors.push(self.$t('common.form_validation.errors.password_required'));
                                break;
                        }
                    }
                }
            }
        }
    }
</script>
