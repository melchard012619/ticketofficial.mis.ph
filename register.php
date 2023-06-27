<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticket";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function checkIfIdIsValid($email)
{
    // Implement your logic to check if the ID is valid and unique
    // For example, you can query the database to see if the email already exists
    global $conn;
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return false; // ID already exists
    }
    return true; // ID is valid and unique
}

if (isset($_POST['email'])) {
    $submittedId = $_POST['email'];
    $isIdValid = checkIfIdIsValid($submittedId);
    if (!$isIdValid) {
        echo "<script>alert('Please Provide Unique Email!!');</script>";
        header("Refresh: 0; url=register.html");

    } else {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $contact = $_POST["contact"];

        $sql = "INSERT INTO register (email, name, contact) VALUES ('$email','$name','$contact')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data was successfully added!');</script>";
            header("Refresh: 0; url=register.html");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>