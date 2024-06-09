<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if email already exists in the database
    $stmt_check = $pdo->prepare('SELECT COUNT(*) FROM students WHERE email = ?');
    $stmt_check->execute([$email]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        // Email already exists, display error message
        $error_message = "Error: Email already exists.";
    } else {
        // Email does not exist, insert new record into the database
        $stmt_insert = $pdo->prepare('INSERT INTO students (name, email) VALUES (?, ?)');
        $stmt_insert->execute([$name, $email]);

        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-3xl mb-4 text-center">Add New User</h2>
        <form method="post" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" required>
                <?php if(isset($error_message)) echo "<p class='text-red-500'>$error_message</p>"; ?>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Add</button>
        </form>
    </div>
</body>

</html>
