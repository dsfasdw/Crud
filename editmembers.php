<?php include 'config.php'; ?>
<?php

if ($_GET['id']) extract($conn->query("SELECT * FROM members WHERE member_id={$_GET['id']}")->fetch_assoc() ?: []);
if ($_POST) {
    extract($_POST);
    if ($name && $email && $phone && $address) {
        $conn->query("UPDATE members SET member_name='$name',member_email='$email',member_phone='$phone',member_address='$address' WHERE member_id=$id");
        header("location: addmembers.php");
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
        <input type="hidden" name="id" value="<?= $member_id ?>">
        <input type="text" name="name" value="<?= $member_name ?>" class="form-control mb-2" placeholder="Name" required>
        <input type="email" name="email" value="<?= $member_email ?>" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="phone" value="<?= $member_phone ?>" class="form-control mb-2" placeholder="Phone" required>
        <input type="text" name="address" value="<?= $member_address ?>" class="form-control mb-2" placeholder="Address" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="addmembers.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
</body>
</html>