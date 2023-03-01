<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<section >
  <div class="new-or-old-cust">
    <p>are you a new customer?</p>

  <form action="./customerinfo.php" method="post">
    <input type="submit" name="newcustomer" value="newcustomer">
  </form>

  <p>or a returning customer?, enter your email</p>
  <fieldset>
    <form action="./customerinfo.php" method="post">
      <input type="hidden" name="existingcustomer" value="existingcustomer">
      <label for="oldemail">Email:</label>
      <input type="oldemail" name="oldemail">
      <button>Submit</button>
    </form>
  </fieldset>
  <button>
    <a class="cart-a" href=".">Buy More Stuff</a>
  </button>
  </div>

</section>
