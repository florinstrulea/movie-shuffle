<!DOCTYPE html>
<html lang="fr">

<head>
    <script tyoe></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bigshot+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Movie Shuffle</title>
</head>

<body id="back">
    <div class="container search">
        <div>
            <a href="index.php">
                <h1 class="title">MovieShuffle</h1>
            </a>
        </div>

        <div class="group-search">

            <div class="loop">
                <img src="./img/transparency.png" alt="">
            </div>
            <form action="search.php?search" id="form">
                <?php
                $search = "";
                ?>
                <input class="search-field hidden" type="text" placeholder="Search" aria-label="Search" name="search" value="<?= $search ?>">
            </form>

        </div>

    </div>