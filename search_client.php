<?php include 'config.php';
if (empty($_GET['search'])) {
    header("Location: addmembers.php");
    exit;
}

$search = trim($_GET['search']);
$search_like = "%$search%";



// Search clients  
$stmt = $conn->prepare("SELECT * FROM clients WHERE id = ? OR name LIKE ? OR email LIKE ?");
$stmt->bind_param("iss", $search, $search_like, $search_like);
$stmt->execute();
$clients = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Search</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <form method="get" class="d-flex mb-3">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control me-2" placeholder="Search" required>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="addmembers.php" class="btn btn-secondary ms-2">All</a>
    </form>

    <h5>Results for "<?= htmlspecialchars($search) ?>"</h5>
    
    

    <?php if ($clients->num_rows > 0): ?>
    <h6>Clients</h6>
    <table class="table table-sm">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
        <?php while($row = $clients->fetch_assoc()): ?>
        <tr>      
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone'] ?? '') ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php endif; ?>

    <?php if ($clients->num_rows == 0): ?>
    <p>No results found.</p>
    <?php endif; ?>
</div>
</body>
</html>