<html>
    <head>
        <title>Task A</title>
    </head>
    <body>
        <h1>Check for perfect palindrome</h1>
        <form>
            <label for="string">String</label>
            <input type="text" name="string"></input>
            <button type="submit">Check for perfect palindrome</button>
        </form>
        <?php print_output() ?>
    </body>
</html>
<?php

function is_palindrome($str)
{
    return $str == strrev($str);
}

function print_output()
{
    if (isset($_GET['string']))
    {
        $input = $_GET['string'];
        $result = is_palindrome($input) ? "is a perfect palindrome" : "not a perfect palindrome";
        echo "<p>The text you entered: <b>'$input'</b> $result.</p>";
    }
}

?>
