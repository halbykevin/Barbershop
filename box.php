<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Page</title>
    <link rel="stylesheet" href="stylesB.css">
</head>
<body>
    <div class="container">
        <div class="left-button">
            <a href="index.php"><button class="back-button">Back</button></a>
        </div>
        <!-- Fix the placement and styling of the listed transactions -->
        <div class="transaction-list">
            <ul>
                <?php
                require "connections.php";

                $query = "SELECT 
                `transaction`.*, 
                `bill`.`services`, 
                `customer`.`Cname`,
                `worker`.`Wname`
            FROM 
                `transaction`
            INNER JOIN 
                `bill` ON `transaction`.`t_id` = `bill`.`t_id`
            INNER JOIN 
                `customer` ON `bill`.`c_id` = `customer`.`c_id`
            INNER JOIN
              `worker` ON `bill`.`w_id` = `worker`.`w_id`;";

                $sql = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($sql)) {
                    $amount = $row['amount'];
                    $date = $row['date'];
                    $details = $row['details'];
                    $type = $row['type'];
                    $Cname = $row['Cname'];
                    $Wname = $row['Wname'];
                    $services = $row['services'];

                    if ($type == 'checkin') {
                        echo "<li>Received $amount$ on $date from $Cname, for $services, by worker $Wname</li>";
                    } else {
                        echo "<li>Paid $amount$ on $date: $details</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
