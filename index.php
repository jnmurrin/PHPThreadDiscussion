<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message Board</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>

    <div class="container">
      <div class="one-half">
      <?php
      require 'function.php';

        foreach($results as $gblist) :
            echo 'Name: ' . $gblist['nickName'] . '<br />' .
            'Date: ' . $gblist['createtime'] . '<br />' .
            'Car: ' . $gblist['carName'] . '<br />' .
            'Device: ' . $gblist['device'] . '<br />' .
            'Social Media: ' . $gblist['social'] . '<br />' .
            'Message: ' . $gblist['contents'] . '<hr>';
        endforeach;

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
