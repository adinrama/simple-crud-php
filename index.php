<?php 

require "functions.php";

$lecturers = query("SELECT * FROM lecturers");

if (isset($_POST["submit"]))
{
  $lecturers = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Dashboard App</title>

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
    <div class="flex justify-center">
      <div class="overflow-x-auto">
        <h2 class="text-2xl font-extrabold mt-5 mb-5 text-gray-800">List of Lecturers</h2>

        <a
          href="add.php"
          class="inline-block rounded bg-slate-600 mb-3 px-4 py-2 text-xs font-medium text-white hover:bg-slate-700"
          >
          Add new data
        </a>

        <form action="" method="POST">
          <input
              size="36"
              type="text"
              name="keyword"
              class="rounded-lg border-gray-200 p-2 pe-48 mb-5 text-sm shadow-sm"
              placeholder="Search data based on name or nrp ..."
              autocomplete="off"
              autofocus
            />
            <button
              type="submit"
              name="submit"
              class="inline-block rounded bg-slate-600 px-4 py-2 text-xs font-medium text-white hover:bg-slate-700"
            >
              Search
            </button>
        </form>

        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
          <thead class="ltr:text-left rtl:text-right">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Image
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Name
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                NRP
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Email
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Department
              </th>
              <th class="px-4 py-2"></th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            <?php $i = 1; ?>
            <?php foreach ($lecturers as $lecturer) : ?>
            <tr>
              <td class="whitespace-nowrap px-4 py-2">
                <img
                  class="size-28"
                  src="img/<?= $lecturer['picture']; ?>"
                  alt="<?= $lecturer['name']; ?>"
                />
              </td>
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                <?= $lecturer["name"]; ?>
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                <?= $lecturer["nrp"]; ?>
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                <?= $lecturer["email"]; ?>
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                <?= $lecturer["department"]; ?>
              </td>
              <td class="whitespace-nowrap px-4 py-2">
                <a
                  href="edit.php?id=<?= $lecturer['id']; ?>"
                  class="inline-block rounded bg-slate-600 px-4 py-2 text-xs font-medium text-white hover:bg-slate-700"
                >
                  Edit
                </a>
                <a
                  href="delete.php?id=<?= $lecturer['id']; ?>"
                  class="inline-block rounded bg-slate-600 px-4 py-2 text-xs font-medium text-white hover:bg-slate-700"
                  onclick="return confirm('Are you sure?');"
                >
                  Delete
                </a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>