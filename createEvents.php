<?php include 'config.php'; ?>
<?php


if ($_POST) {
    extract($_POST);
    if ($name && $date && $venue && $fee) {
        $conn->query("INSERT INTO Events (evName, evDate, evVenue, evRFee) VALUES ('$name', '$date', '$venue', '$fee')");
        header("location: events.php");
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
        <h2>New Events</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
            <input type="date" name="date" placeholder="Date" class="form-control mb-2" required>
            <input type="text" name="venue" placeholder="Venue" class="form-control mb-2" required>
            <input type="number" step="0.01" name="fee" placeholder="Fee" class="form-control mb-2" required>
            <button type="submit" class="btn btn-primary">Add Events</button>
            <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>