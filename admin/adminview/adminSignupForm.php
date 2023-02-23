<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <title>Signup</title>
</head>
<body>
   <header>
      <h1>Create an Account for Sinus Skateshop</h1>
   </header>
   <main>
      <fieldset>        
         <form method="post" action="../adminSignup.php">
         <label for="user">Username</label>
         <input type="text" name="user" required>
         <label for="password">Password</label>         
         <input type="password" name="password" required>
         <button>Submit</button>                 
         </form>
         
      </fieldset>
   </main>
   <a href="./adminloginform.php">back to login</a>
 
</body>
</html>