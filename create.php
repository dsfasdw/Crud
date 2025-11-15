<?php include 'config.php'; ?>
<?php


if ($_POST) {
    extract($_POST);
    if ($name && $email && $phone && $address) {
        $conn->query("INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')");
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
            <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
            <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" required>
            <input type="text" name="address" placeholder="Address" class="form-control mb-2" required>
            <button type="submit" class="btn btn-primary">Add Client</button>
            <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>