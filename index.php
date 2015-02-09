<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
                echo $gblist['nickName'] . ' posted at: ' . $gblist['createtime'] . '<br>' .
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
        
        <div class="form">
            <form id="form1" name="form1" method="post" action="submitting.php">
                <h3>Leave a Message</h3>
                
                <table>
                    <tr>
                        <td><label for="title">Nick Name:</label></td>
                        <td><input id="nickname" name="nickname" type="text" required autofocus /></td>
                        <td>(required, and less than 16 character)</td>
                    </tr>
                    <tr>
                        <td><label for="title">Email:</label></td>                        
                        <td><input id="email" name="email" type="email" required/></td>
                        <td>(less than 60 characters)</td>
                    </tr>
                    <tr>
                        <td><label for="title">Message Contents:</label></td>
                        <td colspan="2"><textarea id="content" name="content" cols="50" rows="8" required></textarea></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Confirm" />
            </form>
        </div>    
    </body>
</html>