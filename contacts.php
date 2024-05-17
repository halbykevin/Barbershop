<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Page</title>
    <link rel="stylesheet" href="stylesC.css">
</head>
<body>
    <div class="container">
        <div class="left-button">
            <a href="index.php"><button class="back-button">Back</button></a>
        </div>
        <div class="content">
            <input type="text" id="searchBar" placeholder="Search contacts...">
            <div class="contact-list">
                <ul>
                    <?php
                    require "connections.php";
                    $sql = mysqli_query($conn, "SELECT * FROM `customer`");
                    while ($row = mysqli_fetch_array($sql)) {
                        $name = $row['Cname'];
                        $nbr = $row['ph_number'];
                        $dob = $row['DoB'];
                        $address = $row['address'];
                        echo "<li>$name, $nbr, $dob, $address</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="right-section">
            <button class="create-btn" onclick="showForm()">Create New Contact</button>
            <div id="contactForm" class="hidden">
                <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="number">Number:</label>
                        <input type="text" id="number" name="nb" required>
                    </div>
                    <div>
                        <label for="birthdate">Birthdate:</label>
                        <input type="date" id="birthdate" name="bday" required>
                    </div>
                    <div>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <button type="submit" class="save-btn" name="sb">Save Contact</button>
                </form>
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                
                require "connections.php";
                if (isset($_POST['sb'])) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $nb = mysqli_real_escape_string($conn, $_POST['nb']);
                    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $query = "INSERT INTO `customer`(`Cname`, `ph_number`, `DoB`, `address`) VALUES ('$name', '$nb', '$bday', '$address')";
                    if (mysqli_query($conn, $query)) {
                        echo "<p>Contact added.</p>";
                    } else {
                        echo "<p>Failed to add contact: " . mysqli_error($conn) . "</p>";
                    }
                    mysqli_close($conn);
                }
                ?>
            </div>
        </div>
    </div>
    <script src="scriptC.js"></script>
</body>
</html>
