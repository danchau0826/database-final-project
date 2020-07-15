<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Our website about book</title>
  </head>

  <body>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--上面的目錄標誌-->
    <button class="tablink" onclick="openPage('Home', this, '#a9a9a9')"><a class="active" href="#"><i class="fa fa-home"></i></a> Home</button>
    <button class="tablink" onclick="openPage('Book_information', this, '#a9a9a9')" id="defaultOpen"><a href="#"><i class="fa fa-search"></i></a> Search book</button>
    <button class="tablink" onclick="openPage('Ranking', this, '#a9a9a9')"> <a href="#"><i class="fa fa-globe"></i></a> Ranking</button>
    <button class="tablink" onclick="openPage('User_part', this, '#a9a9a9')"><a href="#clients"><i class="fa fa-fw fa-user"></i></a> User login</button>

    <!--Page 1 content-->
    <div id="Home" class="tabcontent">
      <img src="images/logo.jpg" width="200" height="200" style="position: relative; top: 5px; right: -780px;" alt="My test image">
      <form action="display.php" method="get">
        <input type="textbook" name="keyword" required="true" placeholder="Search by title, author, publication year" style="margin: 5px 0 22px 0;border: none; background: #f2f2f2; position: relative; top: 28px; left:320px; width: 1000px; height: 50px; padding: 5px; text-align: center; font-size: 25px;">
        <input type="submit" value="Search" style="background-color: #f1f1f1; position: relative; top: 23px; left: 335px; width: 100px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; font-size: 20px; background-position: 10px 10px; background-repeat: no-repeat; padding: 12px 20px 12px 18px; transition: width 0.4s ease-in-out;">
      </form>

      <h1 style="position: relative; left: 530px; top: 18px; font-size: 60px; color: red">Welcome to our website!</h1>
      <h2 style="position: relative; font-size: 28px; left: 200px; top: 10px;">At our website, we want to associate the information about Goodreads (a famous book website) with the database.</h2>
      <h2 style="position: relative; font-size: 28px; left: 200px; top: 8px;">The following is the function we provide at this website:</h2>
      <ul>
        <li style="position: relative; font-size: 28px; left: 240px;">Search the book, and see the information about it</li>
        <li style="position: relative; font-size: 28px; left: 240px;">See Top Highest Rated book on Goodreads</li>
        <li style="position: relative; font-size: 28px; left: 240px;">User login (add some books to the list)</li>
      </ul>
    </div>


    <!--Page 2 content-->
    <div id="Book_information" class="tabcontent">
   		<h1 style="position: relative; left: 690px; top: 0px; font-size: 45px;">Book Information</font></h1>
		<?php
			require('db.php');

      if($_SERVER['REQUEST_METHOD'] != 'GET')
        die('Invalid HTTP method!');
      else
        $bookid = $_GET['bookid'];

      $sql = "SELECT * FROM book WHERE book_id = $bookid";

			$result = mysqli_query($link, $sql);

			if (!$result) {
				die('Query error: ['.$link->error.']');
			}

			$row = mysqli_fetch_array($result, MYSQLI_ASSOC)
		?>
		<img src="<?php echo $row['url']; ?>" style="position: relative; top: -370px; left: 270px; width: 290px; height: 340px;">
		<?php 
			echo '<div style="position: absolute; left: 630px; top: 200px; font-size: 28pt; font-weight:bold;">Title:   <span style="font-size: 30pt;">'.$row['title'].' </span> </div>';
			echo '<div style="position: absolute; left: 630px; top: 260px; font-size: 24pt; font-weight:bold;">Author:   <span style="font-size: 26pt;">'.$row['authors'].' </span> </div>';
			echo '<div style="position: absolute; left: 630px; top: 310px; font-size: 24pt; font-weight:bold;">ISBN:   <span style="font-size: 26pt;">'.$row['isbn'].' </span> </div>';	
			echo '<div style="position: absolute; left: 630px; top: 360px; font-size: 24pt; font-weight:bold;">ISBN13:   <span style="font-size: 26pt;">'.$row['isbn13'].' </span> </div>';	
			echo '<div style="position: absolute; left: 630px; top: 410px; font-size: 24pt; font-weight:bold;">Language:   <span style="font-size: 26pt;">'.strtoupper($row['language']).' </span> </div>';	
			echo '<div style="position: absolute; left: 630px; top: 460px; font-size: 24pt; font-weight:bold;">Publication year:   <span style="font-size: 26pt;">'.$row['year'].' </span> </div>';	
			echo '<div style="position: absolute; left: 630px; top: 510px; font-size: 24pt; font-weight:bold;">Rating:   <span style="font-size: 26pt;">'.$row['rating'].' </span> </div>';	
		?>
    <?php
      $sql_count = "SELECT * FROM list WHERE book_id = $bookid";
      $result_count = mysqli_query($link, $sql_count);
      $count = mysqli_num_rows($result_count);
      echo "<div style='position: absolute; left: 630px; top: 560px; font-size: 24pt; font-weight:bold;'>Reading count: $count</div>";
    ?>
      <a href="add.php?bookid=<?php echo $row['book_id']; ?>">
        <button type="submit" style="width: 200px; height: 80px; padding: 5px; margin: 550px 550px 30px 30px; border: none; background: #F4D03F; text-align: center; font-size: 20px; position: relative; right: -900px; top: -20px; border-radius: 50px;">Read Later</button>
      </a>
      <a href="https://www.goodreads.com/book/show/<?php echo $row['goodreads_id']; ?>">
        <button type="submit" style="width: 200px; height: 80px; padding: 5px; margin: 550px 550px 30px 30px; border: none; background: #F4D03F; text-align: center; font-size: 20px; position: relative; right: -1400px; top: -785px; border-radius: 50px;">View Goodreads</button>
      </a>
    </div>


    <!--Page 3 content-->
    <div id="Ranking" class="tabcontent">
      <h1 style="position: relative; left: 670px; top: 0px; font-size: 45px;">TOP 100 best books! </h1>
      <?php
       require('db.php');

        //my query here
        $sql = 'SELECT * FROM book ORDER BY rating DESC LIMIT 100';

        $result = mysqli_query($link, $sql);

        if (!$result) {
         die('Query error: ['.mysqli_error($link).']');
      }

        $ranking = 1;
      ?>
      <table style="border:3px solid ;" cellpadding="20">
        <thead>
          <tr>
            <th style="font-size: 24px; background-color: white">Rank</th>
            <th style="font-size: 24px; background-color: white">Book title</th>
            <th style="font-size: 24px; background-color: white">Rating</th>
            <th style="background-color: white"> </th>
            <th style="background-color: white"> </th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :?>
          <tr>
            <td style="font-size: 24px; position: relative;" ><?php echo $ranking; ?></td>
            <td style="font-size: 24px; position: relative;"><?php echo $row['title']; ?></td>
            <td style="font-size: 24px; position: relative;"><?php echo $row['rating']; ?></td>
            <td>
              <a href="bookinfo.php?bookid=<?php echo $row['book_id']; ?>">
                <button type="submit" style="font-size: 15px; font-weight: bold; border-radius: 50px;">View Detail</button>
              </a>
            </td>
            <td>
              <a href="add.php?bookid=<?php echo $row['book_id']; ?>">
                <button type="submit" style="font-size: 15px; font-weight: bold; border-radius: 50px;">Read Later</button>
              </a>
            </td> 
          </tr>
            <?php $ranking = $ranking + 1; ?>
            <?php endwhile; ?>
        </tbody>
      </table>
    </div>


    <!--Page 4 content-->
    <div id="User_part" class="tabcontent">
      <h1 style="position: relative; left: 785px; top: 10px; font-size: 50px;">Login here!</h1>
      <form action="login.php" method="post">
        <?php echo $_SESSION['msg']; ?>
        <?php include('errors.php'); ?>

        <div class="input-group">
          <label style="font-size: 30px; position: relative; left: 550px; top: 20px;">Username<br></label>
          <input type="text" name="username" placeholder="Enter username" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 40px; padding: 5px; position: relative; left: 550px; top: 20px;">
        </div>
        <div class="input-group">
          <label style="font-size: 30px; position: relative; left: 550px;">Password<br></label>
          <input type="password" name="password_1" placeholder="Enter password" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 40px; padding: 5px; position: relative; left: 550px;">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="user_login" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 60px; padding: 5px; position: relative; left: 550px; font-size: 20px;">Login !</button>
        </div>
          <p style="font-size: 20px; position: relative; left: 550px;">
            Don't have an account? <a style="font-size: 20px; color: red" href="register.php" >Sign up here</a>
          </p>
          <p style="font-size: 20px; position: relative; left: 550px;">
            Forget your password? <a style="font-size: 20px; color: red" href="reset.php" >Reset here</a>
          </p>
      </form>
    </div>
    <script src="scripts/main.js"></script>
  </body>
</html> 


