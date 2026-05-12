 declare let FCMPlugin;
   var config = {
         apiKey: "AIzaS ",
    authDomain: "myk om",
    databaseURL: " ",
    projectId: "my 88b",
    storageBucket: "mykanv.com",
    messagingSenderId: " "
    };
  firebase.initializeApp(config);
  
  FCMPlugin.onTokenRefresh(function(token){
    console.log('--------------'+token+'----------');
    console.log('firebase token js file loaded');
	 localStorage.setItem('fcmToken',token);
   });

   console.log('firebase token js file loaded here works');
