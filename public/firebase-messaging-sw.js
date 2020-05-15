importScripts('https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js')
importScripts('https://www.gstatic.com/firebasejs/7.7.0/firebase-messaging.js')

var config = {
  apiKey: "AIzaSyB2wjB75LU_7Qg55Ms0kmfX3aySqA5g8A8",
  authDomain: "base-notification.firebaseapp.com",
  databaseURL: "https://base-notification.firebaseio.com",
  projectId: "base-notification",
  storageBucket: "base-notification.appspot.com",
  messagingSenderId: "494124850925",
  appId: "1:494124850925:web:8d1a12cddbd7aaa0e976e4",
  measurementId: "G-1V506XJ4FL"
};;

firebase.initializeApp(config)

const messaging = firebase.messaging()

messaging.setBackgroundMessageHandler(function(payload) {
  console.log(
    '[firebase-messaging-sw.js] Received background message ',
    payload
  )

  const {
    notification: {title, body, image},
  } = payload

  const notificationTitle = title
  const notificationOptions = {
    body: body,
    icon: image,
  }

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions
  )
})