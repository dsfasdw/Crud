<?php include 'config.php'; ?>
<?php

if ($_GET['id']) extract($conn->query("SELECT * FROM clients WHERE id={$_GET['id']}")->fetch_assoc() ?: []);
if ($_POST) {
    extract($_POST);
    if ($name && $email && $phone && $address) {
        $conn->query("UPDATE clients SET name='$name',email='$email',phone='$phone',address='$address' WHERE id=$id");
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Edit Client</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <h2>Edit Client</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="name" value="<?= $name ?>" class="form-control mb-2" placeholder="Name" required>
        <input type="email" name="email" value="<?= $email ?>" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="phone" value="<?= $phone ?>" class="form-control mb-2" placeholder="Phone" required>
        <input type="text" name="address" value="<?= $address ?>" class="form-control mb-2" placeholder="Address" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="search_members.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
</body>
</html>