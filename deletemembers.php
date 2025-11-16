<?php include 'config.php'; ?>
<?php
   if(isset($_GET["id"])){
    $id = $_GET["id"];

    

    $sql = "DELETE FROM members WHERE id=$id";
    $conn->query($sql);
}

header("location: addmembers.php");
exit;
?>