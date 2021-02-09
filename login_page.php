<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="pages/includes/login_page.css">

</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form action="login_function.php" method="POST">
    <div class="layout column align-center">
                            <h1 class="flex text-center mt-4 mb-2 primary--text">
                            DHA CMS Portal</h1> 
                            <h4 class="flex text-xs-center"
                            >Welcome Back!</h4>
                        </div>
    <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtemail" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="txtpassword" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="Login">Login</button>            

    </form>
  </div>
</div>

</body>
</html>
