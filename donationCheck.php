<?php
// Status flag:
$LoginSuccessful = false;

// Check username and password:
// Cannot unset server variables on linux/apache
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
 
    $Username = $_SERVER['PHP_AUTH_USER'];
    $Password = $_SERVER['PHP_AUTH_PW'];
    $hostel = $Username;

    if (
      ($Username == 'something' && $Password == '') ||
      ($Username == 'all' && $Password == '') // enter passwords checks here
     ){
        $LoginSuccessful = true;
    }
}
 

// Login passed successful?
if (!$LoginSuccessful){
 
    /* 
    ** The user gets here if:
    ** 
    ** 1. The user entered incorrect login data (three times)
    **     --> User will see the error message from below
    **
    ** 2. Or the user requested the page for the first time
    **     --> Then the 401 headers apply and the "login box" will
    **         be shown
    */
 
    // The text inside the realm section will be visible for the 
    // user in the login box
    header('WWW-Authenticate: Basic realm=Secret!');
    header('HTTP/1.0 401 Unauthorized');
 
    print "Login failed!\n";
    exit();
}
else {
  $host ="10.105.177.5";
  $username = "hostels";
  $password = ""; // TODO: Enter password here
  $db = "hostels_donation";
  $conn = mysqli_connect($host, $username, $password, $db)  or die("Couldn't connect to Server");
  $SQL="SELECT * FROM covid19";
  $result = $conn->query($SQL);
}
?>

<html>

<head>
  <style>
    table {
      border-style: solid;
      border-width: 2px;
      /* border-color: pink; */
    }
  </style>
</head>

<body bgcolor="#EEFDEF">
  <table border='1'>
    <tr>
      <th>Name</th>
      <th>Roll Number</th>
      <th>Hostel</th>
      <th>Amount</th>
      <th>Condition Accepted?</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc())  {
      if ($row['hostel'] == $hostel || $hostel=="all") {
      $conditon = $row['conditionAccepted']?'Yes':'NO';
      $openingRowStyle = $row['conditionAccepted']?"<tr>":"<tr style='background:red;'>";
        echo $openingRowStyle;
        echo "<td>".$row['first_name']." ".$row["last_name"]."</td>";
        echo "<td>".$row['ldap']."</td>";
        echo "<td>".$row['hostel']."</td>";
        echo "<td>".$row['amount']."</td>";
        echo "<td>".$conditon."</td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
</body>

</html>