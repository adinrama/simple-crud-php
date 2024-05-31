<?php 

$conn = mysqli_connect("localhost", "root", "Adinrama$345", "php_dasar");

function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }

  return $rows;
}

function add($data)
{
  global $conn;

  $name = htmlspecialchars($data["name"]);
  $nrp = htmlspecialchars($data["nrp"]);
  $email = htmlspecialchars($data["email"]);
  $department = htmlspecialchars($data["department"]);

  $image = upload();
  if (!$image)
  {
    return false;
  }

  $query = "INSERT INTO
              lecturers
            VALUES
              (NULL, '$name', '$nrp', '$email', '$department', '$image')
            ";
  mysqli_query($conn, $query);
  
  return mysqli_affected_rows($conn);
}

function upload()
{
  $fileName = $_FILES["picture"]["name"];
  $fileSize = $_FILES["picture"]["size"];
  $error = $_FILES["picture"]["error"];
  $tmpName = $_FILES["picture"]["tmp_name"];

  // Checking for the image has been uploaded or not
  if ($error === 4)
  {
    echo "<script>
            alert('Please, insert the image!');
          </script>";
    return false;
  }
  
  // Checking for the image is valid or not
  $extentValidImage = ["jpg", "jpeg", "png"];
  $extentImage = explode(".", $fileName);
  $extentImage = strtolower(end($extentImage));

  if (!in_array($extentImage, $extentValidImage))
  {
    echo "<script>
            alert('You are do not upload the valid image!');
          </script>";
    return false;
  }

  // Checking for the image if oversized
  if ($fileSize > 1000000)
  {
    echo "<script>
            alert('Your image is oversized!');
          </script>";
    return false;
  }

  // Checking passed, image ready to upload
  // Generate new image name
  $newFileName = uniqid();
  $newFileName .= ".";
  $newFileName .= $extentImage;

  move_uploaded_file($tmpName, "img/" . $newFileName);

  return $newFileName;
}

function delete($id)
{
  global $conn;

  $query = "DELETE FROM lecturers WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function edit($data)
{
  global $conn;

  $id = $data["id"];
  $name = htmlspecialchars($data["name"]);
  $nrp = htmlspecialchars($data["nrp"]);
  $email = htmlspecialchars($data["email"]);
  $department = htmlspecialchars($data["department"]);
  $oldImage = $data["oldPicture"];

  // Check for what is the user choose new image or not
  if ($_FILES["picture"]["error"] === 4)
  {
    $image = $oldImage;
  }
  else 
  {
    $image = upload();
  }

  $query = "UPDATE
              lecturers
            SET 
              name = '$name',
              nrp = '$nrp',
              email = '$email',
              department = '$department',
              picture = '$image'
            WHERE
              id = $id
            ";
  mysqli_query($conn, $query);
  
  return mysqli_affected_rows($conn);
}

function search($keyword)
{
  $query = "SELECT * FROM
              lecturers
            WHERE
              name LIKE '%$keyword%' OR nrp LIKE '%$keyword%'
            ";
  
  return query($query);
}

?>