<table>
   <tr>
      <th scope="row">Name:</th>
      <td><?= $customer->getFirstName(). " " . $customer->getLastName() ?></td>
   </tr>
   <tr>
      <th scope="row">Streetadress:</th>
      <td><?= $customer->getAdress() ?></td>
   </tr>
   <tr>
      <th scope="row">Zipcode:</th>
      <td><?= $customer->getZipcode() ?></td>
   </tr>
   <tr>
      <th scope="row">City:</th>
      <td><?= $customer->getCity() ?></td>
   </tr>
   <tr>
      <th scope="row">Country:</th>
      <td><?= $customer->getCountry() ?></td>
   </tr>
   <tr>
      <th scope="row">Phonenumber:</th>
      <td><?= $customer->getPhone() ?></td>
   </tr>
   <tr>
      <th scope="row">Email:</th>
      <td><?= $customer->getEmail() ?></td>
   </tr>
</table>