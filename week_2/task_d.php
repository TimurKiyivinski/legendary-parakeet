<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <title>Task D</title> 
  </head> 
  <body>
  <form>
    Please input a number:
    <input type="text" name="numberfield">
    <input type="submit" value="Submit" />
  </form>
  <p> Result is shown as below.</p>
</body>

<?php
if (isset($_GET['numberfield']))
{
    $number = $_GET['numberfield'];
    echo $number . '<br/>';
    for ($i = $number; $i > 0; $i--)
    {
        if (($number / $i) != floor($number / $i))
        {
            echo $i . '<br/>';
        }
    }
    echo '1<br/>';
}
?>
