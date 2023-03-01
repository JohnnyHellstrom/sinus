<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <link rel="stylesheet" href="../css/main.css">
   <link rel="icon" href="../images/sinus-logo-symbol - small.png" >
   <title>Login</title>
</head>
<body>
   <header>
      <h1>Login to Sinus Skateshop</h1>      
   </header>

   <?php 
   session_start();
   if(isset($_SESSION['error']))
   {
      echo 'something went wrong, try again!';      
   }
   if(isset($_SESSION['cart'])){
      $_SESSION['message'] = 'you cannot login with something in your cart...';
      header('location: ../../cart.php');
   }
   ?>

   <main>      
      <fieldset>         
         <form method="post" action="../adminLogin.php">
         <label for="user">User</label>
         <input type="text" name="user" required>
         <label for="password">Password</label>
         <input type="password" name="password" required>
         <button>Submit</button>
    </form>
      </fieldset>
   </main>   
</body>
</html>