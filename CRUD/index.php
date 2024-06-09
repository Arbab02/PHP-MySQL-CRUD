<?php
require_once 'config.php';

$stmt = $pdo->query('SELECT * FROM students');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App - Users</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-3xl mb-4 text-center">Users</h2>
        <a href="add.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New User</a>
        <!-- Add an input field for filtering -->
        <input type="text" id="searchInput" class="border border-gray-300 rounded px-4 py-2 mb-4 w-full md:w-1/2 mx-auto" placeholder="Search by name">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>

                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['name']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['email']; ?></td>
                     
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" class="text-red-500 hover:text-red-700">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Include the separate JavaScript file -->
    <script src="script.js"></script>
</body>

</html>

