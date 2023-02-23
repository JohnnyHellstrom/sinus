<?php
include('header.php');

?>

<h2>Fill in your information</h2>

<a href=".">returning customer?</a>


<fieldset>
  <legend></legend>
  <form action="." method="post">
    <label for="firstname">First name:</label>
    <input type="text" name="firstname" required>
    <label for="lastname">Last name:</label>
    <input type="text" name="lastname" required>
    <label for="email">Email:</label>
    <input type="text" name="email" required>
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