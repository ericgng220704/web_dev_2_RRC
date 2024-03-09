<?php

/*******w******** 
    
    Assignment 2
    Name: Gia Hao Nguyen
    Date: 23-01-2024
    Description: Assignment 2 form

****************/
     $submitted = isset($_POST['fullname']);
     if($submitted){
           $content = "Thanks you for your submission, {$_POST['fullname']}";
     }

    

    $products = [
          'MacBook' => ['price' => '1899.99', 'i' => '1'],
          'Razer gaming Mouse' => ['price' => '79.99', 'i' => '2'],
          'WD' => ['price' => '179.99', 'i' => '3'],
          'Nexus 7 phone' => ['price' => '249.99', 'i' => '4'],
          'Drum' => ['price' => '119.99', 'i' => '5']
    ]

// items: qt1, qt2,..5
// cartTotal
// address: address
//         city
//         province
//         postal
//         email

?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta
               name="viewport"
               content="width=device-width, initial-scale=1.0"
          />
          <link rel="stylesheet" href="main.css" />
          <title>Thanks for your order!</title>
     </head>
     <body>
          <!-- Remember that alternative syntax is good and html inside php is bad -->
          <?php
               if($submitted):
          ?>
          <div class="wrapper">
               <h1><?= $content ?></h1>
               <h2>Here is the summary of your order:</h2>

               <div class="table">
                    <table>
                         <tbody>
                              <tr>
                                   <td colspan="4">Address information</td>
                              </tr>
                              <tr>
                                   <td class="alignright">Address:</td>
                                   <td><?= $_POST['address'] ?></td>
                                   <td class= "alignright">City:</td>
                                   <td><?= $_POST['city'] ?></td>
                              </tr>
                              <tr>
                                   <td class= "alignright">Province:</td>
                                   <td><?= $_POST['province'] ?></td>
                                   <td class= "alignright">Postal Code:</td>
                                   <td><?= $_POST['postal'] ?></td>
                              </tr>
                              <tr>
                                   <td colspan="2" class= "alignright">Email:</td>
                                   <td colspan="2"><?= $_POST['email'] ?></td>
                              </tr>
                         </tbody>
                    </table>
               </div>
               <div class="table">
                    <table>
                         <tbody>
                              <tr>
                                   <td colspan="4">Order information</td>
                              </tr>
                              <tr>
                                   <td>Quantity</td>
                                   <td colspan="2">Description</td>
                                   <td>Cost</td>
                              </tr>


                              <?php
                                   $total = 0;
                                   foreach($products as $item => $info):
                                        $qty = "qty".$info['i'];
                                         if(isset($_POST[$qty]) && $_POST[$qty] > 0):
                                             $totalItemPrice = $_POST[$qty] * $info['price'];
                                             $total += $totalItemPrice;
                              ?>
                              <tr>
                                   <td><?= $_POST[$qty] ?></td>
                                   <td colspan="2"><?= $item ?></td>
                                   <td><?= $totalItemPrice ?></td>
                              </tr>
                              <?php                                            
                                   endif;
                                   endforeach 
                              ?>
                              <tr>
                                   <td colspan="3" class= "alignright">Total:</td>
                                   <td><?= $total ?></td>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </div>
          <?php
               else:
          ?>

          <div class = "not-submitted">
               <h1>Sorry, this page can only be loaded when submitting an order.</h1>
          </div>

          <?php
               endif
          ?>        
     </body>
</html>


