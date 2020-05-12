import axios from 'axios';

const Get = (self, paramsRequest, paramsUrl) => {
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
                alert(err.response.data.message);
                self.$router.push('/dashboard');
            } 
        });
}