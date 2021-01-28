<!DOCTYPE html>
<html>
<head>
	<title>Firebase Prototype</title>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

    <!-- <script src = "includes/myjs.js"> </script> -->

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-database.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyBnkwO43zyKSed4kpG3DcYD_AGaUdAzxD0",
            authDomain: "prototype-project-qr.firebaseapp.com",
            databaseURL: "https://prototype-project-qr.firebaseio.com",
            projectId: "prototype-project-qr",
            storageBucket: "prototype-project-qr.appspot.com",
            messagingSenderId: "301828957114",
            appId: "1:301828957114:web:15ffaa8700d363108c3383",
            measurementId: "G-QHGZJY6Z3D"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

<style>
* {
    padding : 0;
    margin : 0;
}
body {
    width : 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
form {
    width: 400px;
    border: solid 1px #EBEBEB;
    padding: 5rem;
}
</style>
</head>
<body>

<form action="insert_function.php" method="post" enctype="multipart/form-data">
            <div>
                <label>Choose CSV File</label> 
                <input type="file" name="filename" id="file" accept=".csv" required>
                <button type="submit" id="submit" name="submit" class="btn-submit">Import</button>
            </div>

</form>
    
</body>
</html>