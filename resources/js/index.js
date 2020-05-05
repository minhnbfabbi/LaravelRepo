// Views
import Login from './components/Login'
import Register from './components/Register'
import Dashboard from './components/Dashboard'

export const routes = [
	{ path: '/login', name: 'Login', component: Login },
	{ path: '/register', name: 'Register', component: Register },
	{ path: '/dashboard', name: 'Dashboard', component: Dashboard }
];