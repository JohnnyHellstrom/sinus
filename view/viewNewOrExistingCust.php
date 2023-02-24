<?php
include('header.php');
?>


<p>are you a new customer?</p>

<a href="viewNewCustomerform.php"><button>new customer</button></a>
<p>or a returning customer?, enter your email</p>
<fieldset>
  <form action="../customerinfo.php" method="post">
    <input type="hidden" name="action" value="existingcustomer">
    <label for="email">Email:</label>
    <input type="email" name="email">
    <button>Submit</button>
  </form>
</fieldset>

<?php
include('footer.php');
?>
