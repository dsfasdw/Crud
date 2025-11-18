<?php include 'config.php'; ?>
<?php

$result = $conn->query("SELECT * FROM Events");
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>My Shop</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
   
<div class="mb-4">
    <form method="get" action="search_events.php" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search..." required>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="createEvents.php" class="btn btn-success ms-2">+ New</a>
    </form>
    <table class="table table-striped">
        <tr><th>Event ID</th><th>Name</th><th>Date</th><th>Veneu</th><th>Fee</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['evCode'] ?></td>
            <td><?= $row['evName'] ?></td>
            <td><?= $row['evDate'] ?></td>
            <td><?= $row['evVenue'] ?></td>
            <td><?= $row['evRFee'] ?></td>

          
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>