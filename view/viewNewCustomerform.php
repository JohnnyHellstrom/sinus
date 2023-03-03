<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>

<h2>Fill in your information</h2>
<fieldset>
  <form action="./customerinfo.php" method="post">
    <input type="hidden" name="action" value="newcustomerinfo">
    <label for="firstname">First name:</label>
    <input type="text" name="firstname" required>
    <label for="lastname">Last name:</label>
    <input type="text" name="lastname" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="phone">Phone number:</label>
    <input type="text" name="phone" required>
    <label for="streetadress">Adress:</label>
    <input type="text" name="streetadress" required>
    <label for="zipcode">Zipcode:</label>
    <input type="text" name="zipcode" required>
    <label for="city">City:</label>
    <input type="text" name="city" required>
    <label for="country">Country:</label>
    <input type="text" name="country" required>
    <button>Order</button>       
  </form>
</fieldset>

