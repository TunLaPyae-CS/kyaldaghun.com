<?php

session_start();

//$mysqli = new mysqli('localhost','root', '','shwemyatchel_ytvideos') or die(mysqli_error($mysqli));
$mysqli = new mysqli('10.148.0.6','myatchel_ytvideos', 'vv0nd3R*fuL','myatchel_ytvideos') or die(mysqli_error($mysqli));

$id = 0;
$vid = '';
$title = '';
$description = '';
$date = '';
$update = false;

if (isset($_POST['save'])) {
    $vid = $_POST['vid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $mysqli->query("INSERT INTO data (vid, title, description, date) VALUES ('$vid','$title','$description','$date')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("Location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("Location: index.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    if ($result) {
        $row = $result->fetch_assoc();
        $vid = $row['vid'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $vid = $_POST['vid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $mysqli->query("UPDATE data SET vid='$vid',title='$title',description='$description',date='$date' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("Location: index.php");
}