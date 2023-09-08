<?php
include("database.php"); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="top-heading">To Do List Application</h1>
    <div class="container">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox">
                <button type="submit" name="add" id="add">ADD</button>
            </div>
            <ul class="list">
                <?php 
                $itemslist = get_items();
                while($row = mysqli_fetch_assoc($itemslist))
                {
                ?>
                <li class="item">
                    <p><?php echo $row["item"] ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"] ?>"><i class="fa-solid fa-check"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"] ?>"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
            <?php 
                $itemslist = get_items_checked();
                while($row = mysqli_fetch_assoc($itemslist))
                {
                ?>
            <li class="item fade">
                    <p class="deleted-text"><span> <?php echo $row["item"] ?> </span></p>
                    <div class="icon-container">
                        <button type="submit" name="" id="check"><i class="fa-solid fa-check hidden"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"] ?>"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>
</body>

</html>