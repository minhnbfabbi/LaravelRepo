import store from './store';
import app from './app';

const setAuthEmpty = function() {
	store.dispatch('setAuth', {auth: false, username: ''});
}
const checkAuth = function() {
	console.log("checkAuth");
	axios.get('/api/check-auth')
        .then(function(res) {
            var authCheck = res.data;
        	store.dispatch('setAuth', authCheck);
        })
        .catch(function(err) {
        	console.log(app.$router);
        	console.log(app.$router.history.current.name);
            if(err.response.status && app.$router.history.current.name) {
                alert(err.response.data.message);
                app.$router.push('/login');
            } 
        });
}

const auth = {
	checkAuth,
	setAuthEmpty
};

export default auth;