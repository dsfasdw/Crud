<?php include 'config.php'; ?>
<?php

$result = $conn->query("SELECT * FROM clients");
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>My Shop</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <h2>Clients</h2>
    <a href="create.php" class="btn btn-primary mb-3">+ New Client</a>
    <table class="table table-striped">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>