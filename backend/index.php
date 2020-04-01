<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Shwe Myat Chel - Backend</title>
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php

    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
    </div>
    <?php endif ?>
    <div class="container">
    <?php
        //$mysqli = new mysqli('localhost','root', '','shwemyatchel_ytvideos') or die(mysqli_error($mysqli));
        $mysqli = new mysqli('10.148.0.6','myatchel_ytvideos', 'vv0nd3R*fuL','myatchel_ytvideos') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data");
        //pre_r($result);
    ?>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Vid</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['vid']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php   }
            ?>
        </table>
    </div>

    <?php
        function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>

    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <div class="form-group">
        <label>Video ID</label>
        <input type="text" name="vid" class="form-control" value="<?php echo $vid; ?>" placeholder="Enter youtube video id">
        </div>
        <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter youtube video title">
        </div>
        <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
        <label>Publish Date</label>
        <input type="text" name="date" class="form-control" value="<?php echo $date; ?>" placeholder="Publish Date">
        </div>
        <div class="form-group">
            <?php
            if ($update == true):
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif ?>
        </div>
    </form>
    </div>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>