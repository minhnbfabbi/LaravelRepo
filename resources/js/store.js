import Vue from 'vue';
import Vuex from 'vuex';
import app from './app';

Vue.use(Vuex);

const mutations = {
	SET_LANG (state, payload) {
	  	app.$i18n.locale = payload;
	},
	SET_AUTH (state, payload) {
		state.auth = payload.auth;
		state.username = payload.username;
	},
	SET_DASHBOARD_VISIBLE_LINK (state, payload) {
		state.dashboard_visible_link = payload;
	},
	SET_NOTIFICATION (state, payload) {
		state.notification = JSON.parse(payload.body);
		app.$notify({
			group: 'notifications-firebase',
			title: state.notification.title,
			text: state.notification.content
        });
	}
}

const actions = {
	setLang({commit}, payload) {
	  	commit('SET_LANG', payload);
	},
	setAuth({commit}, payload) {
		commit('SET_AUTH', payload);
	},
	setDashboardVisibleLink({commit}, payload) {
		commit('SET_DASHBOARD_VISIBLE_LINK', payload);
	},
	setNotification({commit}, payload) {
		commit('SET_NOTIFICATION', payload);
	}
}

export default new Vuex.Store({
	state: {
		auth: false,
		username: '',
		dashboard_visible_link: false,
		notification: {}
	},
	mutations,
	actions
})