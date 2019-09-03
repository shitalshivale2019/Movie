<?php
  require 'menu.php';
  require'config.php';

?>
<!DOCTYPE>
<html>
  <head>
    <title>Admin Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <?php
      if(isset($_SESSION['pid'])){
        $pid=$_SESSION['pid'];
        //echo $pid;
        $accept=mysqli_query($conn,"SELECT * FROM movie WHERE id='$pid'");
        $num=mysqli_num_rows($accept);
        if($accept){
          if($num==1){
            //echo "yess";
            while($r=mysqli_fetch_assoc($accept)){
              $id=$r['id'];
              $title=$r['title'];
              $comment=$r['comment'];
              $image=$r['image'];
              $website=$r['website'];
              $contact=$r['contact'];

              //echo $id."".$comment."".$website;
              ?>
              <div class="row">
              <div class="col-75">
                <div class="container">
                  <center><h2>publication</h2></center>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-50">
                        <input type="hidden" name="pid" value="<?php echo $pid;?>">
                        
                        <label>title:</label>
                        <input type="text" name="title" id="title" value="<?php echo $title;?>">

                        <label>Comment:</label>
                        <textarea name="text" height="300px" id="comment"><?php echo $comment;?></textarea>

                        <label>Image:</label>
                        <?php echo "<img src=data:image/jpg;base64,$image width='5%'>"?>
                        <input type="file" name="image">
                        <br><br>

                        <label>Website Link:</label>
                        <input type="text" name="link" id="link" value="<?php echo $website;?>">

                        <label>Email or Contact:</label>
                        <input type="text" name="contact" id="contact" value="<?php echo $contact;?>">
                      </div>
                    </div>
                      <input type="submit" name="update" value="update" class="btn">
                      <input type="submit" name="delete" value="delete" class="btn">
                    </form>
                </div>
              </div>
            </div>
              <?php
                if(isset($_POST['update'])){
                  $title=addslashes($_POST['title']);
                  $comment=addslashes($_POST['text']);
                  $website=addslashes($_POST['link']);
                  $contact=addslashes($_POST['contact']);

                  $imgpath=$_FILES['image']['tmp_name'];
                  if($imgpath){
                    $img_binary=fread(fopen($imgpath,"r"),filesize($imgpath));
                    $image=base64_encode($img_binary);

                    $update=mysqli_query($conn,"UPDATE movie SET title='$title',comment='$comment',image='$image',website='$website',contact='$contact' WHERE id='$pid'");
                    if($update){
                      echo "<script language='Javascript'>";
                      echo "document.location.replace('./home.php')";
                      echo "</script>"; 
                    }else{
                      echo $conn->error;
                    }
                  }else{
                    $update=mysqli_query($conn,"UPDATE movie SET title='$title',comment='$comment',website='$website',contact='$contact' WHERE id='$pid'");
                    if($update){
                      echo "<script language='Javascript'>";
                      echo "document.location.replace('./home.php')";
                      echo "</script>"; 
                    }else{
                      echo $conn->error;
                    }
                  }
                }
                if(isset($_POST['delete'])){
                  $delete=mysqli_query($conn,"DELETE FROM movie where id='$pid'");
                  echo "<script language='Javascript'>";
                  echo "document.location.replace('./home.php')";//go to user page
                  echo "</script>";
                }
            }
          }
        }
      }
      else
      {
        echo "<script language='Javascript'>";
        echo "document.location.replace('./page1.php')";
        echo "</script>";
      }
    ?>
  </body>
</html>