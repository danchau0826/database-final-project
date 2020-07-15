<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign up system</title>
  </head>

  <body>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' charset="utf-8">
    <link href="styles/style.css" rel="stylesheet" type="text/css" charset="utf-8">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--上面的目錄標誌-->
    <button class="tablink" onclick="openPage('Home', this, '#a9a9a9')"><a class="active" href="#"><i class="fa fa-home"></i></a> Home</button>
    <button class="tablink" onclick="openPage('Book_information', this, '#a9a9a9')"><a href="#"><i class="fa fa-search"></i></a> Search book</button>
    <button class="tablink" onclick="openPage('Ranking', this, '#a9a9a9')"> <a href="#"><i class="fa fa-globe"></i></a> Ranking</button>
    <button class="tablink" onclick="openPage('User_part', this, '#a9a9a9')" id="defaultOpen"><a href="#clients"><i class="fa fa-fw fa-user"></i></a> User login</button>

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
      <h1 style="position: relative; left: 450px; top: 60px; color: red; font-size: 50px;">Search the book you have an interest in!</h1>
      <h1 style="position: relative; left: 420px; top: 100px; font-size: 40px;">You can search the book by the following three ways:</h1>
      <form action="display.php" method="get">
        <input type="textbook" name="keyword" placeholder="Search by title, author, publication year" required="true" style="margin: 5px 0 22px 0;border: none; background: #f1f1f1; position: relative; top: 160px; left:450px; width: 800px; height: 50px; padding: 5px; text-align: center; font-size: 25px;">
        <input type="submit" value="Search" style="background-color: #f1f1f1; position: relative; top: 155px; left: 480px; width: 100px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; font-size: 20px; background-position: 10px 10px; background-repeat: no-repeat; padding: 12px 20px 12px 18px;">
      </form>
      <form action="genre.php" method="get">
        <label for="genres" style="font-size: 35px; position: relative; top: 300px; left: 570px;">Search by genre:</label>
        <select name="genres" id="genres" style="font-size: 28px; width: 13%;position: relative; top: 300px; left: 595px;">
          <option value="" style="">Choose a genre</option>
          <option value="art">Art</option>
          <option value="adult">Adult</option>
          <option value="biography">Biography</option>
          <option value="business">Business</option>
          <option value="child">Children</option>
          <option value="classic">Classic</option>
          <option value="comic">Comic</option>
          <option value="fiction">Fiction</option>
          <option value="horror">Horror</option>
          <option value="manga">Manga</option>
          <option value="fantasty">Fantasty</option>
          <option value="romance">Romance</option>
          <option value="psychology">Psychology</option>
          <option value="philosophy">Philosophy</option>
        </select>
        <input type="submit" value="Search" style="background-color: #f1f1f1; position: relative; top: 300px; left: 610px; width: 100px; height: 50px; border: 2px solid #ccc; font-size: 20px; background-position: 10px 10px; padding: 10px 20px 10px 15px;">
      </form>

      <form action="prize.php" method="get">
        <label for="prizes" style="font-size: 35px; position: relative; top: 150px; left: 470px;">Search by Prize/Award:</label>
        <select name="prizes" id="prizes" style="font-size: 28px; width: 18%;position: relative; top: 150px; left: 495px;">
          <option value="">Choose a Prize/Award</option>
          <option value="nobel-prize">Nobel Prize</option>
          <option value="orange-prize">Orange Prize</option>
          <option value="hugo">Hugo Award</option>
          <option value="pulitzer-prize">Pulitzer Prize</option>
        </select>
        <input type="submit" value="Search" style="background-color: #f1f1f1; position: relative; top: 150px; left: 520px; width: 100px; height: 50px; border: 2px solid #ccc; font-size: 20px; background-position: 10px 10px; padding: 10px 20px 10px 15px;">
      </form>
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
      <h1 style="position: relative; left: 785px; top: 10px; font-size: 50px;">Sign up here!</h1>
      <form action="register.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group">
          <label style="font-size: 30px; position: relative; left: 550px; top: 20px;">Username<br></label>
          <input type="text" name="username" placeholder="Enter username" value="<?php echo $username; ?>" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 40px; padding: 5px; position: relative; left: 550px; top: 20px;">
        </div>
        <div class="input-group">
          <label style="font-size: 30px; position: relative; left: 550px;">Password<br></label>
          <input type="password" name="password_1" placeholder="Enter password (at least 6 characters)" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 40px; padding: 5px; position: relative; left: 550px;">
        </div>
        <div class="input-group">
          <label style="font-size: 30px; position: relative; left: 550px;">Confirm password<br></label>
          <input type="password" name="password_2" placeholder="Enter password again!" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 40px; padding: 5px; position: relative; left: 550px;">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="user_signup" style="margin: 5px 0 22px 0;border: none; width: 40%; height: 60px; padding: 5px; position: relative; left: 550px; font-size: 20px;">Sign up !</button>
        </div>
        <p style="font-size: 20px; position: relative; left: 550px;">
            Already have an account? <a style="font-size: 20px; color: red" href="login.php" >Login here</a>
        </p>
      </form>
    </div>
    <script src="scripts/main.js"></script>
  </body>
</html> 