<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <title>A Simple Example</title> 
  </head> 
  <body>
  <H1>Fetching data with PHP</H1>

  <form>
      <label>
          User Name:
          <input type="text" name="name">
        </label>
        <br/>
        <label>
            Password:
            <input type="password" name="password">
        </label>
        <br/>
        <label>
            Gender:
            <input type="radio" name="gender" value="male">Male</input>
            <input type="radio" name="gender" value="female">Female</input>
        </label>
        <br/>
        <label>
            Age:<br/>
            <select name="age">
                <option value="12-17">12-17</option>
                <option value="18-30">18-30</option>
                <option value="31-50">31-50</option>
            </select>
        </label>
        <br/>
        <label>
            Email:
            <input type="email" name="email"></input>
        </label>
        <br/>
		<input type="submit" value="Send to server" />
  </form>
  
  <p> The result data will refresh current page.</p>
  </body> 

<?php 
    if (
        isset($_GET['name']) &&
        isset($_GET['password']) &&
        isset($_GET['gender']) &&
        isset($_GET['age']) &&
        isset($_GET['email'])
    )
    {
        echo "Registration Success!<br/>";
        echo "Name: " . $_GET['name'] . "<br/>";
        echo "Password: " . $_GET['password'] . "<br/>";
        echo "Gender: " . $_GET['gender'] . "<br/>";
        echo "Age: " . $_GET['age'] . "<br/>";
        echo "Email: " . $_GET['email'] . "<br/>";

        date_default_timezone_set('EST');
        echo "Registration Time: " . date('l F jS h:i:s T Y');
    }
?>

</HTML>
