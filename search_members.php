<?php include 'config.php';

if (empty($_GET['search'])) {
    header("Location: addmembers.php");
    exit;
}

$search = trim($_GET['search']);
$stmt = $conn->prepare("SELECT * FROM members WHERE member_id = ? OR member_name LIKE ? OR member_email LIKE ?");
$search_like = "%$search%";
$stmt->bind_param("iss", $search, $search_like, $search_like);
$stmt->execute();
$result = $stmt->get_result();
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
        <a href="createmembers.php" class="btn btn-success ms-2">+ New</a>
    </form>

    <h5>Results for "<?= htmlspecialchars($search) ?>"</h5>
    
    <?php if ($result->num_rows > 0): ?>
    <table class="table table-sm">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['member_id'] ?></td>
            <td><?= htmlspecialchars($row['member_name']) ?></td>
            <td><?= htmlspecialchars($row['member_email']) ?></td>
            <td>
                <a href="editmembers.php?id=<?= $row['member_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <a href="deletemembers.php?id=<?= $row['member_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>No results found.</p>
    <?php endif; ?>
</div>
</body>
</html>