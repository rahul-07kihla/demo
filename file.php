<?php
  $msg = "";

  
  extract($_POST);
    
  echo "$uname";
  echo "<br>";
  echo "$email";
  echo "<br>";
  echo "$number";
  echo "<br>";
  echo "$pwd";
  echo "<br>";
  echo "$cpwd";
  echo "<br>";

  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  
    $filename = $_FILES["resume"]["name"];
    $tempname = $_FILES["resume"]["tmp_name"];    
    $folder = "uploader/".$filename;
          
    $conn = mysqli_connect('localhost', 'root', '' , 'myproject2021');

    if($conn->connect_error)
    {
        die("connection fail" . $conn->connect_erro) . "<br>";
    }
    else
    {
        echo "conection successfull<br>";
    }
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO registration(username, email, phonenumber, password, confirmpassword, resume) VALUES ('$uname','$email','$number','$pwd','$cpwd','$resume')";
  
        // Execute query
        $res = mysql_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }

    $query = "SELECT id, username, email, phonenumber, password, confirmpassword, resume FROM registration WHERE 1";
    $res1 = mysqli_query($conn , $query);

  while($data = mysqli_fetch_assoc($res1))
{
  
?>
<img src="<?php echo $data['resume']; ?>">
  
<?php
}
?>