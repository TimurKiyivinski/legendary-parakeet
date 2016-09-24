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

function get_makes($connection)
{
    $result = mysqli_query($connection, 'SELECT DISTINCT make FROM inventory');
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function has_query()
{
    return isset($_POST['make']);
}

function get_results($connection, $query)
{
    $result = mysqli_query($connection, "SELECT * FROM inventory WHERE make = '$query'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<html>
    <head>
        <title>Task C</title>
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
        <form method="post">
            <label for="make">Please select a make:</label>
            <select name="make">
                <?php foreach(get_makes($connection) as $make) { ?>
                <option value="<?php echo $make['make'] ?>"><?php echo $make['make'] ?></option>
                <?php } ?>
            </select>
            <br/>
            <button type="submit">Search</button>
        </form>
        <?php if (has_query()) { ?>
        <hr/>
        <h2>Content of inventory table</h2>
        <table>
            <tr>
                <td>Make</td>
                <td>Model</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>
            <?php foreach(get_results($connection, $_POST['make']) as $result) { ?>
            <tr>
                <td><?php echo $result['make']?></td>
                <td><?php echo $result['model']?></td>
                <td><?php echo $result['price']?></td>
                <td><?php echo $result['quantity']?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>
</html>
