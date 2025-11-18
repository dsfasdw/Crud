<?php include 'config.php'; ?>
<?php
   if(isset($_GET["id"])){
    $id = $_GET["id"];

    

    $sql = "DELETE FROM Events WHERE evCode=$id";
    $conn->query($sql);
}

header("location: events.php");
exit;
?>