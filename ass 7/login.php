<?php
session_start();

// Check if the user is already logged in, if yes, redirect to index page
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login
    $username = $_POST['username'];

    // Validate username (you might want to add more validation)
    if (!empty($username)) {
        // Connect to MySQL database (change credentials as needed)
        $conn = mysqli_connect("localhost", "username", "password", "database_name");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Check if username exists in the database
        $query = "SELECT name FROM users WHERE name='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Username exists, set session variable and redirect to index page
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            // Username does not exist
            echo "Invalid username.";
        }

        // Close connection
        mysqli_close($conn);
    } else {
        echo "Username is required.";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="username"><br>
    <input type="submit" value="Login">
</form>
