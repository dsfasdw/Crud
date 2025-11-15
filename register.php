<?php include 'config.php'; ?>
<?php
if ($_POST) {
    extract($_POST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $role = $conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'] == 0 ? 'admin' : 'user';
    $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <h2>Register</h2>
    <form method="post">
        <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="login.php" class="btn btn-link">Login</a>
    </form>
</div>
</body>
</html>