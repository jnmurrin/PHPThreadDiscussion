<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message Board</title>

    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

    <body>

        <div class="container">

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
                echo '<h3>' . $gblist['nickName'] . ' <small>posted at: ' . $gblist['createtime'] . '</small></h3><br>' .
                    'contents: ' . $gblist['contents'] . '<br><hr>';
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

          <h3>Leave a Message</h3>
          <form id="form1" name="form1" method="post" action="submitting.php">
            <div class="form-group">
              <label for="">Nick Name</label> (required, and less than 16 character)
              <input class="form-control" id="nickname" name="nickname" type="text" required autofocus>
            </div>
            <div class="form-group">
              <label for="">Email</label> (less than 60 characters)
              <input class="form-control" id="email" name="email" type="email" required>
            </div>
            <div class="form-group">
              <label for="">Message Contents</label>
              <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>

    </body>
</html>
