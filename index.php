<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Volunteer Sign-Up</title>

    <script type="text/javascript">

      function loadinfo()
      {
        var val = document.getElementById("datat").textContent.trim();
        var array = val.split("|");
        var i;
        for(i=0; i<array.length; i++)
        {
          var vals = array[i];
          var narray = vals.split(" ");
          var j;
          for(j=0; j<25; j++)
          {
            var slot = document.getElementById("" + j).textContent.trim();
            var name;
            if(j==0)
            {
              name = "Friday";
            }
            else if(j<=12)
            {
              name = "Saturday";
            }
            else
            {
              name = "Sunday";
            }
            if(narray.length == 3 && slot.localeCompare(narray[2])==0 && name.localeCompare(narray[1])==0)
            {
              document.getElementById("" + j).innerHTML = slot+" : " +narray[0];
            }
          }
        }
      }
      window.onload = loadinfo;

    </script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab&display=swap" rel="stylesheet">
    <style media="screen">
      body
      {
        background-color: #ffffff;
        font-family: 'Josefin Slab', serif;
        color: white;
      }
      .submit
      {
        position: fixed;
        bottom: 20px;
        color: #D02120;
        text-align: center;
        align-items: center;
        right:0;
        left: 0;
      }
      .Title
      {
        text-align: center;
        margin: 5px;
        margin-bottom: 20px;
        background-color: #D02120;
        margin-top: 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        margin-left: 0;
        margin-right: 0;
        color: white;
      }
      .day
      {

        padding: 20px;
        margin: 85px;
        text-align: center;
        background-color: #D02120;
        border-radius: 20px;
        margin-top:40px;
        margin-right: 55px;
      }
      .list
      {
        list-style-type: none;
        padding-left: 0;
        text-align: left
      }
      li
      {
        margin:10px;
      }
      .main
      {
        text-align: center;
        position: absolute;
        top: 50px;
        margin: auto;
        width:100%;
        height:80%;
        padding: 10px;
      }
      .day
      {
        display: inline-block;
        vertical-align: middle;
      }
      .info
      {
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="Title">
      <h1>Temple Volunteering Sign-Up : SVT</h1>
    </div>
    <div class="main">
      <div class="day" id="circle">
        <p><b>Sign-Up Here</p>
      </div>
    <div class="day" id="friday">
      <h2><u>Friday</u></h1>
      <ul class = "list">
        <li  id="0">6-9</li>
      </ul>
    </div>
      <div class="day" id = "saturday">
        <h2><u>Saturday</u></h1>
        <ul class = "list">
          <li id="1">9-10</li>
          <li id="2">10-11</li>
          <li id="3">11-12</li>
          <li id="4">12-1</li>
          <li id="5">1-2</li>
          <li id="6">2-3</li>
          <li id="7">3-4</li>
          <li id="8">4-5</li>
          <li id="9">5-6</li>
          <li id="10">6-7</li>
          <li id="11">7-8</li>
          <li id="12">8-9</li>
        </ul>
      </div>
      <div class="day" id = "sunday">
        <h2><u>Sunday</u></h1>
        <ul class = "list">
          <li id="13">9-10</li>
          <li id="14">10-11</li>
          <li id="15">11-12</li>
          <li id="16">12-1</li>
          <li id="17">1-2</li>
          <li id="18">2-3</li>
          <li id="19">3-4</li>
          <li id="20">4-5</li>
          <li id="21">5-6</li>
          <li id="22">6-7</li>
          <li id="23">7-8</li>
          <li id="24">8-9</li>
        </ul>
      </div>
    </div>
    <div class="submit">
      <form action="submit.php" method="get">
        Name: <input type="text" name="name">
        Day: <select class="dayp" name="day">
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>

        </select>
        Time: <input type="text" name="time" value="ex: 1-2">
        <input type="submit" name="Submit" value = "Submit">
      </form>
    </div>
    <div class="info" id = "datat">
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


        $search = "SELECT * FROM SVT";
        $searchval = mysqli_query($conn, $search);

        if(!$searchval)
        {
          die('Could not get data: ' . mysqli_error());
        }
        while($row = mysqli_fetch_array($searchval))
        {
          echo "{$row['name']} {$row['day']} {$row['tme']}|";
        }
       ?>
    </div>
    </div>
  </body>
</html>
