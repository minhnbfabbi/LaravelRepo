// Views
import Login from './components/Login'
import Register from './components/Register'
import Dashboard from './components/Dashboard'
import NotifyCreate from './components/Notify/Create'
import NotifyShow from './components/Notify/Show'

export const routes = [
	{ path: '/login', name: 'Login', component: Login },
	{ path: '/register', name: 'Register', component: Register },
	{ path: '/dashboard', name: 'Dashboard', component: Dashboard },
	{ path: '/notifies/create', name: 'NotifyCreate', component: NotifyCreate },
	{ path: '/notifies/:id', name: 'NotifyShow', component: NotifyShow }
];