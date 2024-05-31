<?php 

require "functions.php";

if (delete($_GET["id"]) > 0)
{
  echo "
    <script>
      alert('Successfully delete data!');
      document.location.href = 'index.php';
    </script>
  ";
}
else
{
  echo "
    <script>
      alert('Failed to delete data!');
      document.location.href = 'index.php';
    </script>
  ";
}

?>