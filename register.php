<?php include 'config.php'; ?>
<?php
if ($_POST) {
    extract($_POST);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $role = $conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'] == 0 ? 'admin' : $_POST['role'];
    $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-3">Register</h2>
    <form method="post">
        <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <select name="role" class="form-control mb-3" required>
            <option value="user">User</option>
            <option value="coach">Coach</option>
            <?php if($conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'] == 0): ?>
                <option value="admin">Admin</option>
            <?php endif; ?>
        </select>
        <button type="submit" class="btn btn-primary w-100 mb-2">Register</button>
        <a href="login.php" class="btn btn-outline-secondary w-100">Login</a>
    </form>
</div>
</body>
</html>