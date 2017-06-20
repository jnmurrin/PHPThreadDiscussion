<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message Board</title>

    <style>
    .one-half{
      width: 45%;
      float:left;
      padding: 0 2%;
    }
    </style>

  </head>

    <body>

      <div class="container">
        <div class="one-half">

        <?php
          require 'database.php';
          $pagesize = 4;
          if(isset($_GET['p'])){
              $p = $_GET['p'];
          }else{
              $p = 1;
          }
          $offset = ($p-1)*$pagesize;

          $query = "SELECT * FROM GUESTBOOK ORDER BY ID DESC LIMIT $offset, $pagesize";
          $results = $db->query($query);

          foreach($results as $gblist) :
              echo '<p>Name: ' . $gblist['nickName'] . '</p>' .
              '<p>Date: ' . $gblist['createtime'] . '</p>' .
              '<p>Car: ' . $gblist['carId'] . '</p>' .
              '<p>device: ' . $gblist['device'] . '</p>' .
              '<p>Social: ' . $gblist['social'] . '</p>' .
              '<p>Message: ' . $gblist['contents'] . '</p><hr>';
          endforeach;

          $count_sql = "SELECT count(*) FROM guestbook";
          $count_result = $db->query($count_sql);
          $count_array = $count_result->fetch();

          $pagenum=ceil($count_array[0]/$pagesize);
          echo 'There are ' . $count_array[0] . ' messages.';

          if($pagenum > 1){
              for($i = 1; $i<=$pagenum; $i++){
                  if($i==$p){
                      echo '[' . $i . ']';
                  }else{
                      echo '<a href="index.php?p=' . $i . '">' . $i . '</a>';
                  }
              }
          }
        ?>
      </div>
      <div class="one-half">

        <h3>Leave a Message</h3>
        <form id="form1" name="form1" method="post" action="submitting.php">

          <p><label for="">Nick Name</label> (required, and less than 16 character)</p>
          <input id="nickname" name="nickname" type="text" required autofocus>

          <p><label for="">Email</label> (less than 60 characters)</p>
          <input id="email" name="email" type="email" required>

          <p><label>Select a Car</lable></p>
          <select id="car" name="car">
            <?php
            $carQuery = "SELECT * FROM cars ORDER BY carId DESC";
            $carResults = $db->query($carQuery);

            foreach($carResults as $gblist) :
              echo '<option value="'.$gblist['carId'].'">'.$gblist['carName'].'</option>';
            endforeach;
            ?>
          </select>

          <fieldset>
            <legend>What is Your Favorite device?</legend>
            <input type="checkbox" name="device[]" value="Smart Watch" />Smart Watch <br />
            <input type="checkbox" name="device[]" value="Phone" />Phone<br />
            <input type="checkbox" name="device[]" value="Tablet" />Tablet<br />
            <input type="checkbox" name="device[]" value="Laptop" />Laptop<br />
          </fieldset>

          <fieldset>
            <legend>What is Your Favorite social media?</legend>
            <input type="checkbox" name="social-media[]" value="Facebook" />Facebook <br />
            <input type="checkbox" name="social-media[]" value="Instagram" />Instagram<br />
            <input type="checkbox" name="social-media[]" value="Twitter" />Twitter<br />
            <input type="checkbox" name="social-media[]" value="Codepen" />Codepen<br />
          </fieldset>

          <p><label for="">Message Contents</label></p>
          <textarea id="content" name="content" rows="3" required></textarea>

          <button type="submit">Submit</button>

        </form>
      </div><!-- /onehalf -->
      </div>

    </body>
</html>
