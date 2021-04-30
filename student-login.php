<html>
<head>
<link rel="stylesheet" type="text/css"  href="login.css">
<script type="text/javascript" src="login.js"></script>
</head>
<body>
  <div class="login-page">
    <h1 align="center"><b>STUDENT LOGIN</b></h1>
      <div class="form">
        <?php
          session_start();
          if(isset($_SESSION["error"]))
          {
            echo '<span style="color:red;">'.$_SESSION["error"].'</span>';
          }
        ?>
        <form class="login-form" action="student-login-helper.php" method="post">
          <input type="text" placeholder="username" name="username" required>
          <input type="password" placeholder="password" name="password" required>
	         <button>login</button>
           <?php
              if(isset($_SESSION["error"]))
              {
                session_unset();
              }
            ?>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
	          <p class="message"><a href="admin-login.php">Login as Admin  &nbsp |</a><a href="index.php">&nbsp Back to home page</a></p>
        </form>'
      </div>
  </div>
</body>
</html>