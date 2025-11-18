<?php include 'config.php'; ?>
<?php

if ($_GET['id']) extract($conn->query("SELECT * FROM Events WHERE evCode={$_GET['id']}")->fetch_assoc() ?: []);
if ($_POST) {
    extract($_POST);
    if ($name && $email && $phone && $address) {
        $conn->query("UPDATE Events SET evName='$name',evDate='$date',evVenue='$venue',evRFee='$fee' WHERE evCode=$id");
        header("location: events.php");
    }
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Edit Client</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"></head>
<body>
<div class="container my-5">
    <h2>Edit Events</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $evCode ?>">
        <input type="text" name="name" value="<?= $evName ?>" class="form-control mb-2" placeholder="Name" required>
        <input type="date" name="date" value="<?= $evDate ?>" class="form-control mb-2" placeholder="Date" required>
        <input type="text" name="venue" value="<?= $evVenue ?>" class="form-control mb-2" placeholder="Venue" required>
        <input type="number" step="0.01" name="fee" value="<?= $evRFee ?>" class="form-control mb-2" placeholder="Fee" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="search_events.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>
</body>
</html>