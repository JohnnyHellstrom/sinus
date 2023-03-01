<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
</main>
<footer>
<section class="container">
            <article class="nav">
                <h2>Nav</h2>
                <ul>
                    <li><a href=".">Products</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="./admin/adminview/adminLoginForm.php">Login</a></li>
                </ul>   
          
            </article>

            <article class="address">   
               <h2>Address</h2>
               <a href="https://www.google.com/maps/place/G%C3%B6taplatsen+12,+412+56+G%C3%B6teborg/@57.6972692,11.9769006,17z/data=!3m1!4b1!4m5!3m4!1s0x464ff3714ca260d5:0x2f7017f270e74348!8m2!3d57.6972692!4d11.9790893" target="_blank">
               <p>Götaplatsen 12</p>
               <p>412 56 Gothenburg</p>
               
               </a>
            </article>

            <article class="social-media">   
               <h2>Social Media</h2>
               <div class="social-icons-container">
               <a href="https://twitter.com/" target="_blank"><img src="./images/logo-twitter.svg" alt="twitter logo"></a>
               <a href="https://facebook.com/" target="_blank"><img src="./images/logo-facebook.svg" alt="facebook logo"></a>
               <a href="https://instagram.com/" target="_blank"><img src="./images/logo-instagram.svg" alt="instagram logo"></a>
               </div>
            </article>
</footer>
</body>
</html>