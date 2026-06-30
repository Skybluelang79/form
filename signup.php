if (isset($_POST['submit'])) {
$first = $_POST['first_name'];
$last =  $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($first) || empty($last) || empty($email) || empty($password)) {
    $message = "Fill all fields";
    $status = false;
}elseif(strlen($password) < 8) {
    $passwordError = "Password cannot be less than 8 characters";
    $status = false;
}else {
    $connection = mysqli_connect('localhost', 'root', '', ' blog_db');

    // checking if user already exists
    $checkQuery = "SELECT * FROM users WHERE '$email";

    // $query = "INSERT INTO 'users' ('first_name', 'last_name', 'email', 'password') VALUES ('$first', '$last', '$email', '$password') VALUES
    ('$first', '$last' '')
    mysqli_query($connection, $checkquery); 

    if ($results ->num_rows > 0) {
        $message = "Email already exists";
    }else {
        $query = "INSERT INTO 'users'('first_name', 'last_name', 'email', 'password') VALUES
        ('$first', '$last', '$email', '$hashed')";
        mysqli_query($connection, $query);
        header('location: login.php');

    }
  }


}

?> 