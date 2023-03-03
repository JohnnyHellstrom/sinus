<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>

<fieldset>
    <h2>Fill in your information</h2><legend></legend>
  <form action="./customerinfo.php" method="post">
    <input type="hidden" name="action" value="oldcustomerinfo">
    <label for="firstname">First name:</label>
    <input type="text" name="firstname" value="<?= $oldCustomer->getFirstName() ?>" required>
    <label for="lastname">Last name:</label>
    <input type="text" name="lastname" value="<?= $oldCustomer->getLastName() ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $oldCustomer->getEmail() ?>" required>
    <label for="phone">Phone number:</label>
    <input type="text" name="phone" value="<?= $oldCustomer->getPhone() ?>" required>
    <label for="streetadress">Adress:</label>
    <input type="text" name="streetadress" value="<?= $oldCustomer->getAdress() ?>" required>
    <label for="zipcode">Zipcode:</label>
    <input type="text" name="zipcode" value="<?= $oldCustomer->getZipcode() ?>" required>
    <label for="city">City:</label>
    <input type="text" name="city" value="<?= $oldCustomer->getCity() ?>" required>
    <label for="country">Country:</label>
    <input type="text" name="country" value="<?= $oldCustomer->getCountry() ?>" required>
    <button>Order</button>       
  </form>
</fieldset>
