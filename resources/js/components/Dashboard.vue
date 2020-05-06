<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $t('dashboard.title') }}</div>

                    <div class="card-body">
                        <p>{{ $t('dashboard.content') }}</p>
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

                })
                .catch(function(err) {
                    if(err.response.status) {
                        alert(err.response.data.message);
                        self.$router.push('/login');
                    } 
                });
        },
    }
</script>
