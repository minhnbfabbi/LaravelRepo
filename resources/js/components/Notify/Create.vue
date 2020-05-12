<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $t('create_notify.title') }}</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="create()">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ $t('create_notify.input_text.title') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="data.title"  required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ $t('create_notify.input_text.content') }}</label>

                                <div class="col-md-6">
                                    <textarea v-model="data.content" placeholder="" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary">
                                        {{ $t('create_notify.buttons.create') }}
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
            var self = this;
            axios.get(this.$_apiUrl + 'admin/notifies/create')
                .then(function(res) {
                    
                })
                .catch(function(err) {
                    if(err.response.status) {
                        // alert(err.response.data.error);
                        self.$router.push('/dashboard');
                    } 
                });
        },
        data: function() {
            return {
                data: {
                    title: '',
                    content: ''
                }
            }
        },
        methods: {
            create() {
                var self = this;
                var data = self.data;
                axios.post(this.$_apiUrl + 'admin/notifies/store', data)
                    .then(function(res) {
                        alert(self.$t('register.messages.register_success'));
                        self.data = {
                            title: '',
                            content: ''
                        }
                    })
                    .catch(function(err) {
                        if(err.response.status) {
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
        }
    }
</script>
