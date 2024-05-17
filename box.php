<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Box Page</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="container">
      <div class="left-button">
        <a href="index.php"><button class="back-button">Back</button></a>
      </div>
      <!-- fix the placement and styling of the listed transactions -->
      <div class = "transaction-list">
      <ul>
      <?php
      require "connections.php";
       $sql = mysqli_query($conn, "SELECT * FROM `transaction`");
       while ($row = mysqli_fetch_array($sql)) {
           $amount =$row['amount'];
           $date =$row['date'];
           $details =$row['details'];
           $type = $row['type'];
           if($type == 'checkin'){
            echo "<li> Recieved $amount $ on $date, from $details</li>";
           }
           else{
            echo "<li> Payed $amount $ on $date: $details</li>";
           }
           
       }
      ?>
      </ul>
      </div>
    </div>
  </body>
</html>
