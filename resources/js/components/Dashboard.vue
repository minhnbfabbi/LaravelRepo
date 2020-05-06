<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $t('dashboard.title') }}</div>

                    <div class="card-body">
                        <h3>{{ $t('dashboard.content') }}</h3>
                        <form>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">{{ $t('dashboard.user.name') }}:</label>
                                <div class="col-sm-9">
                                    {{ user.name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">{{ $t('dashboard.user.email') }}:</label>
                                <div class="col-sm-9">
                                    {{ user.email }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">{{ $t('dashboard.user.created_at') }}:</label>
                                <div class="col-sm-9">
                                    {{ user.created_at }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">{{ $t('dashboard.user.updated_at') }}:</label>
                                <div class="col-sm-9">
                                    {{ user.updated_at }}
                                </div>
                            </div>
                        </form>
                        <div class="back-to-login">
                            <router-link :to="{path: '/login'}">{{ $t('common.back_to_login') }}</router-link>
                        </div>
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
            axios.get('/api/home')
                .then(function(res) {
                    var userInfo = res.data;
                    // self.user.name = userInfo.name;
                    // self.user.email = userInfo.email;
                    self.user = {
                        name: userInfo.name,
                        email: userInfo.email,
                        created_at: userInfo.created_at,
                        updated_at: userInfo.updated_at,
                    };
                })
                .catch(function(err) {
                    if(err.response.status) {
                        // alert(err.response.data.message);
                        // self.$router.push('/login');
                    } 
                });
        },
        data: function() {
            return {
                user: {
                    name: '',
                    email: '',
                    created_at: '',
                    updated_at: ''
                }
            }
        }
    }
</script>
