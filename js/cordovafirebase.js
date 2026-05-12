 declare let FCMPlugin;
   var config = {
         apiKey: "AIzaSyAMWuHaa9JUt2m0vcRmyCWQiNOfsuDnxII",
    authDomain: "mykanta-d688b.firebaseapp.com",
    databaseURL: "https://mykanta-d688b.firebaseio.com",
    projectId: "mykanta-d688b",
    storageBucket: "mykanta-d688b.appspot.com",
    messagingSenderId: "935489991997"
    };
  firebase.initializeApp(config);
  
  FCMPlugin.onTokenRefresh(function(token){
    console.log('--------------'+token+'----------');
    console.log('firebase token js file loaded');
	 localStorage.setItem('fcmToken',token);
   });

   console.log('firebase token js file loaded here works');