<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Selection</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Selected Services</h2>
        <ul id="selectedServices"></ul>
        <div class="total">
            <strong>Total:</strong> $<span name = 'ttl' id="totalAmount">0</span>
        </div>
        <button class="checkout-btn" onclick="openCheckoutModal()">Checkout</button>
    </div>
    <div class="container">
        <div class="top-buttons">
            <a href="box.php"><button class="box-btn">Box</button></a>
            <a href="contacts.php"><button class="contacts-btn">Contacts</button></a>
        </div>
        <div class="buttons">
            <?php
            require "connections.php";
            $result1 = mysqli_query($conn, "SELECT * FROM `services`");
            while ($row = mysqli_fetch_array($result1)) {
                $type = $row['type'];
                $price = $row['price'];
                echo "<button onclick=\"addToSidebar('$type', $price)\">$type - $ $price</button>";
            }
            ?>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal hidden">
        <div class="modal-content">
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
            <span class="close" onclick="closeCheckoutModal()">&times;</span>
            <h2>Checkout</h2>
            <input  type="text" id="searchContact" placeholder="Search contacts..." >
            <div id="contactList">
                <?php
                $contacts = mysqli_query($conn, "SELECT * FROM `customer`");
                while ($contact = mysqli_fetch_array($contacts)) {
                    echo "<p name = 'cntct' onclick=\"selectContact('".$contact['Cname']."')\">".$contact['Cname']."</p>";
                }
                ?>
            </div>
            <!-- <select id="personSelect">
                <option value="Zouhair">Zouhair</option>
                <option value="Issa">Issa</option>
            </select> -->

            <?php
            require 'connections.php';
            $workersql = mysqli_query($conn, "SELECT * FROM `worker`");
            echo "<select id='personSelect' name = 'wrkr'>";
            while($row = mysqli_fetch_array($workersql)){
            echo "<option value = ".$row['w_id']. ">". $row['Wname']."</option>";
            }
            echo "</select>";
    
            ?>
            <button name = 'finish' id="finishBtn" onclick="finishCheckout()">Finish</button>
            </form>
            <?php
            require 'connections.php';
                if(isset($_POST['finish'])){
                    if (isset($_POST['totalAmount'])) {
                        $totalAmount = $_POST['totalAmount'];
                        // Now you can use $totalAmount as needed, e.g., save it to the database or use it in your logic
                        // For demonstration, we'll just echo it
                        echo "Total Amount received: $" . $totalAmount;
                    } else {
                        echo "No total amount received.";
                    }
                    //$amount = $_POST['amount'];
                    $date = date('Y-m-d');
                    $w_id = $_POST['wrkr'];

                    $addTrans = "INSERT INTO `transaction` (`amount`, `date`, `type`) VALUES ('$amount', '$date', 'checkin')";
                    if (mysqli_query($conn, $addTrans)) {
                       echo "<p> success</p>";
                    } 
                }
            
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
