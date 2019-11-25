<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Submit</title>
    <style media="screen">
      body
      {
        color:#D02120;
        text-align: center;
        font-size: 35px;
      }
    </style>
  </head>
  <body>
    <?php

    $dbhost = 'remotemysql.com:3306';
    $dbuser = '3ipOqVynm9';
    $dbpass = 'FlIpPUilwY';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    if(! $conn )
     {
       die('Could not connect: ' . mysqli_error());
    }

    $db = mysqli_select_db($conn,'3ipOqVynm9');

    $name = $_GET["name"];
    $day = $_GET["day"];
    $time = $_GET["time"];

    $search = "SELECT * FROM SVT";
    $searchval = mysqli_query($conn, $search);

    if(!$searchval)
    {
      die('Could not get data: ' . mysqli_error());
    }

    $timedate = False;

    while($row = mysqli_fetch_array($searchval))
    {
       $dayin = $row['day'];
       $timein = $row['tme'];
       if(($day == $dayin) and ($timein == $time))
       {
         $timedate = True;
       }
    }

    if($timedate)
    {
      echo "The day and time chosen is already filled. Pick another time.";
    }




    else if(($name=="Pranav V" or $name=="Gan") and $time=="9513")
    {
      $sql = "DELETE FROM SVT";
      $retval = mysqli_query($conn, $sql);

      if(!$retval)
      {
        die('Could not enter data: ' . mysqli_error());
      }
      echo "Reset";
    }
    
    else if(stripos('6-9 9-10 10-11 11-12 12-1 1-2 2-3 3-4 4-5 5-6 6-7 7-8 8-9',$time)==false)
    {
      echo "Invalid Date/Time";
    }

    else
    {
      $sql = "INSERT INTO SVT (name,day,tme) VALUES ('$name','$day','$time')";

      $retval = mysqli_query($conn, $sql);

      if(!$retval)
      {
        die('Could not enter data: ' . mysqli_error());
      }
      echo "Submited";
    }
    mysqli_close($conn)
    ?>
    <form class="" action="index.php" method="post">
      <input type="submit" name="" value="return">
    </form>
    <img src="https://happyologist.co.uk/wp-content/uploads/happy.jpeg" alt="">
  </body>
</html>
