<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    // Sanitize and retrieve the user's email
    $email = $con->real_escape_string($_POST['Email']);

    // Retrieve the user's data from the database based on the email
    $query = $con->prepare("SELECT ID, Email, Password FROM YOUR_TABLE WHERE Email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the provided password against the stored hashed password
        if (password_verify($_POST['Password'], $row['Password'])) {
            $_SESSION['loggin'] = true;
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
         
            // redirects to correct page
            if ($_SESSION['loggin'] == true) {
                header("Location: Admin.php");
                exit; // Terminate script after redirection
            }
        } else {
            echo "Incorrect Password!!!";
            echo '<a href="home">Click here to go back.</a>';
        }
    } else {
        echo "Incorrect Email!!!";
    }
}else{
    header('location: index.php');
}
?>
