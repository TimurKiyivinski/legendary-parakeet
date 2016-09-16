<html>
    <head>
        <title>Task B</title>
    </head>
    <body>
        <p>Input a suburb in the textbox below and click the search button to see the result</p>
        <form>
            <label for="suburb">Suburb:</label>
            <input type="text" name="suburb"></input>
            <button type="submit">Search</button>
        </form>
        <?php print_output() ?>
    </body>
</html>
<?php

function read_csv($file_name)
{
    $csv = [];
    $csv_file = fopen($file_name, 'r');
    if ($csv_file !== false)
    {
        while (($row = fgetcsv($csv_file)) !== false)
        {
            $csv[] = $row;
        }
    }
    fclose($csv_file);
    return $csv;
}

function get_postcode($suburb)
{
    $suburbs = read_csv('postcode.txt');
    foreach($suburbs as $row)
    {
        if ($row[1] == $suburb)
        {
            return $row[0];
        }
    }
    return false;
}

function print_output()
{
    if (isset($_GET['suburb']))
    {
        $input = $_GET['suburb'];
        $postcode = get_postcode($input);
        $output = $postcode === false ? "Invalid suburb name provided" : "The postcode of $input is: $postcode";
        echo "<p>$output</p>";
    }
}

?>
