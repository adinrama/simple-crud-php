<?php 

require "functions.php";

$id = $_GET["id"];
$lecturer = query("SELECT * FROM lecturers WHERE id = $id")[0];

if (isset($_POST["submit"]))
{
  if (edit($_POST) > 0)
  {
    echo "
      <script>
        alert('Successfully edit data!');
        document.location.href = 'index.php';
      </script>
    ";
  }
  else
  {
    echo "
    <script>
      alert('Failed to edit data!');
      document.location.href = 'index.php';
    </script>
  ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Lecturer Data</title>

  <!-- My CSS Style -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap");

      * {
        font-family: "Quicksand", sans-serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
        scroll-behavior: smooth;
      }
    </style>
    
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
    <div class="max-w-lg">
      <form action="#" method="POST" enctype="multipart/form-data" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
        <p class="text-center text-lg font-medium">Edit new lecturer data</p>

        <!-- Get ID -->
        <input
        type="hidden"
        name="id"
        value="<?= $lecturer["id"]; ?>"
        />
        
        <!-- Get old picture -->
        <input
          type="hidden"
          name="oldPicture"
          value="<?= $lecturer['picture']; ?>"
        />

        <div>
          <label for="name" class="sr-only">Name</label>
          <div class="relative">
            <input
              type="text"
              name="name"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?= $lecturer["name"]; ?>"
              placeholder="Enter name"
              required
            />
          </div>
        </div>

        <div>
          <label for="nrp" class="sr-only">NRP</label>
          <div class="relative">
            <input
              type="text"
              name="nrp"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?= $lecturer["nrp"]; ?>"
              placeholder="Enter nrp"
              required
            />
          </div>
        </div>

        <div>
          <label for="email" class="sr-only">Email</label>
          <div class="relative">
            <input
              type="email"
              name="email"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?= $lecturer["email"]; ?>"
              placeholder="Enter email"
              required
            />
          </div>
        </div>

        <div>
          <label for="department" class="sr-only">Department</label>
          <div class="relative">
            <input
              type="text"
              name="department"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?= $lecturer["department"]; ?>"
              placeholder="Enter department"
              required
            />
          </div>
        </div>

        <div>
          <label for="image" class="sr-only">Image</label>
          <img src="img/<?= $lecturer['picture']; ?>" alt="<?= $lecturer['name']; ?> class='size-14'">
          <div class="relative">
            <input
              type="file"
              name="picture"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              placeholder="Upload image"
            />
          </div>
        </div>

        <button
          type="submit"
          name="submit"
          class="block rounded-lg bg-indigo-600 px-3 py-1 text-sm font-medium text-white"
        >
          Edit Data!
        </button>
      </form>
    </div>
  </div>
</body>
</html>