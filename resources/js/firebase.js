import firebase from 'firebase';

const config = {
    apiKey: "AIzaSyB2wjB75LU_7Qg55Ms0kmfX3aySqA5g8A8",
    authDomain: "base-notification.firebaseapp.com",
    databaseURL: "https://base-notification.firebaseio.com",
    projectId: "base-notification",
    storageBucket: "base-notification.appspot.com",
    messagingSenderId: "494124850925",
    appId: "1:494124850925:web:8d1a12cddbd7aaa0e976e4",
    measurementId: "G-1V506XJ4FL"
};

firebase.initializeApp(config);

const messaging = firebase.messaging();

const setToken = function(authenticate) {
	messaging.requestPermission()
	    .then(function () {
	        return messaging.getToken()
	    })
	    .then(function(token) {
	       	authenticate(token);
	    })
	    .catch(function (err) {
	        console.log("Unable to get permission to notify.", err);
	    });
}

const deleteToken = function() {
	messaging.deleteToken();
}

const listenToFirebase = function() {
	messaging.onMessage((payload) => {
		var notify = payload.notification;
		alert(notify.title);
		// console.log('Message received. ', payload);
	});
}

export default {
	setToken,
	deleteToken,
	listenToFirebase
}
