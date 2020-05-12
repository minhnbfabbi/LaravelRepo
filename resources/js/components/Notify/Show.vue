<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $t('dashboard.title') }}</div>

                    <div class="card-body">
                        <h3>{{ data.title }}</h3>
                        <p>{{ data.content }}</p>
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
            var id = self.$route.params.id;
            axios.get('/api/notifies/' + id)
                .then(function(res) {
                    var notify = res.data;
                    self.data = {
                        title: notify.title,
                        content: notify.content,
                        created_at: notify.created_at,
                        updated_at: notify.updated_at
                    };
                })
                .catch(function(err) {
                    if(err.response.status) {
                        // alert(err.response.data.message);
                        self.$router.push('/dashboard');
                    } 
                });
        },
        data: function() {
            return {
                data: {
                    title: '',
                    content: '',
                    created_at: '',
                    updated_at: ''
                }
            }
        },
        methods: {
            
        },
        computed: {

        }
    }
</script>
