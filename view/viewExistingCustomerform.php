<?php
include('header.php');

?>

<h2>Fill in your information</h2>

<fieldset>
  <legend></legend>
  <form action="../customerinfo.php" method="post">
    <input type="hidden" name="action" value="oldcustomerinfo">
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

<?php
include('footer.php');
?>