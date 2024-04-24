<!DOCTYPE html>
<html>
<head>
    <title>Array Search Example</title>
</head>
<body>

<?php
// Define the array of employee names
$employee_names = array(
    "Rahul",
    "Priya",
    "Amit",
    "Sonia",
    "Vikram",
    "Anjali",
    "Ravi",
    "Divya",
    "Ajay",
    "Neha",
    "Arun",
    "Pooja",
    "Sandeep",
    "Meera",
    "Prashant",
    "Shalini",
    "Sanjay",
    "Sunita",
    "Rajesh",
    "Anita"
);


// Function to search for a name in the array
function searchName($name, $array) {
    return in_array($name, $array);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_name = $_POST["search_name"];
    $found = searchName($search_name, $employee_names);
    if ($found) {
        echo "<p>$search_name exists in the array.</p>";
    } else {
        echo "<p>$search_name does not exist in the array.</p>";
    }
}
?>

<h2>Search Employee Name</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="search_name">Enter Name:</label>
    <input type="text" id="search_name" name="search_name">
    <input type="submit" value="Search">
</form>

</body>
</html>
