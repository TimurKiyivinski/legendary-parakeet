<?php
$db = [
    "host" => "db",
    "username" => "root",
    "password" => "password",
    "database" => "wad"
];

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

if (mysqli_connect_errno())
{
    exit();
}

function get_rows($connection)
{
    $result = mysqli_query($connection, "SELECT * FROM inventory");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<html>
    <head>
        <title>Task D</title>
        <style>
            table {
                width: 100%;
            }
            table, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h2>Insert a new row:</h2>
        <form method="post">
            <label for="make">Make:<label>
            <input type="text" name="make"></input><br/>
            <label for="model">Model:<label>
            <input type="text" name="model"></input><br/>
            <label for="price">Price:<label>
            <input type="text" name="price"></input><br/>
            <label for="quantity">Quantity:<label>
            <input type="text" name="quantity"></input><br/>
            <button type="submit">Add</button>
        </form>
<?php
if (isset($_POST['make'])
    && isset($_POST['model']) 
    && isset($_POST['price']) 
    && isset($_POST['quantity']))
{
    $make = $_POST['make'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $values = "'$make', '$model', '$price', '$quantity'";
    $query = "INSERT INTO inventory (make, model, price, quantity) VALUES ($values)";
    if (mysqli_query($connection, $query) === TRUE)
    {
        echo "<p>Successfully inserted data into inventory table.</p>";
    }
    else
    {
        echo mysqli_error($connection);
    }
}
?>
        <hr/>
        <h2>Content of inventory table</h2>
        <table>
            <tr>
                <td>Make</td>
                <td>Model</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>
            <?php foreach(get_rows($connection) as $row) { ?>
            <tr>
                <td><?php echo $row['make']?></td>
                <td><?php echo $row['model']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['quantity']?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
