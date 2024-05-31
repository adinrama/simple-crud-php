<?php 

require "functions.php";

if (isset($_POST["submit"]))
{
  if (add($_POST) > 0)
  {
    echo "
      <script>
        alert('Successfully add new data!');
        document.location.href = 'index.php';
      </script>
    ";
  }
  else
  {
    echo "
      <script>
        alert('Failed to add new data!');
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
  <title>Add Lecturer Data</title>

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
        <p class="text-center text-lg text-gray-800 font-medium">Add new lecturer data</p>

        <div>
          <label for="name" class="sr-only">Name</label>
          <div class="relative">
            <input
              type="text"
              name="name"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              placeholder="Enter name"
              autofocus
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
              placeholder="Enter department"
              required
            />
          </div>
        </div>

        <div>
          <label for="image" class="sr-only">Image</label>
          <div class="relative">
            <input
              type="file"
              name="picture"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              placeholder="Enter image"
            />
          </div>
        </div>

        <button
          type="submit"
          name="submit"
          class="block rounded-lg bg-indigo-600 px-3 py-1 text-sm font-medium text-white"
        >
          Add Data!
        </button>
      </form>
    </div>
  </div>
</body>
</html>