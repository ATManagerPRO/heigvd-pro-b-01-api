<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Google sign-in</title>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="519635922975-srjbdqifao801nbn21tu6b6hd057d058.apps.googleusercontent.com">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>

    <h1>Google sign-in</h1>

    <p>
        {{ $test  }}
    </p>

    <div class="g-signin2" data-onsuccess="onSignIn"></div>

    <a href="#" onclick="signOut();">Sign out</a>


    <script>

        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            console.log('Token : ' + googleUser.getAuthResponse().id_token);

            // Send token to backend
            /*
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                console.log('Signed in as: ' + xhr.responseText);
            };
            xhr.send('idtoken=' + id_token);
            */
        }


        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }

    </script>

</body>
</html>
