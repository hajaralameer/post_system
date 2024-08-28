<?php
require_once '../../autoload.php';
//echo $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/index.php");
    exit;
}
try {
    $database = new Database();
    $db = $database->getConnection();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

/*$db = (new Database())->getConnection();

*/
$userModel = new User($db);
$user = $userModel->getUserById($_SESSION['user_id']);
if ($user) {
    // Check if 'name' key exists in the user array
    $userName = isset($user['name']) ? htmlspecialchars($user['name']) : 'Name not available';
    echo "User Name: " . $userName;
} else {
    echo "User not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars( $userName); ?>!</h1>
        <p>You are now logged in.</p>
        <a href="../../public/logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>
