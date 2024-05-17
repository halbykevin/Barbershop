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
            <strong>Total:</strong> $<span id="totalAmount">0</span>
        </div>
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
                $type =$row['type'];
                $price = $row['price'];
                echo "<button onclick=\"addToSidebar('$type', $price)\">$type - $ $price</button>";
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
