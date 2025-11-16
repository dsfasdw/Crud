<?php include 'config.php'; ?>
<?php

$result = $conn->query("SELECT * FROM members");
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>My Shop</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <h2>Members</h2>
  
     <!-- Search Form -->
     <div class="mb-4">
    <form method="get" action="search_members.php" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search..." required>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="createmembers.php" class="btn btn-success ms-2">+ New</a>
    </form>
</div>
    <table class="table table-striped">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['member_id'] ?></td>
            <td><?= $row['member_name'] ?></td>
            <td><?= $row['member_email'] ?></td>
            <td><?= $row['member_phone'] ?></td>
          
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>