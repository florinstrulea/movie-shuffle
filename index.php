<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);
$movieDescription;
function spaceToDash($film)
{
    strtolower($film["title"]);
    if (str_contains($film["title"], " ")) {
        $film["title"] = str_ireplace(" ", "-", $film["title"]);
    }
    return $film;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
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

<body>
    <div class="container">
        <a href="index.php">
            <h1 class="title">MovieShuffle</h1>
        </a>
    </div>
    <div class="container movies">
        <div class="row">
            <?php
            foreach ($movies as $movie) {
                $movieEdit = spaceToDash($movie);
            ?>
                <div class="image-container col-xl-6">
                    <a href="movie.php?id=<?= $movie["id"] ?>">
                        <img src="img/poster/<?= $movieEdit["title"] . "." . "jpg" ?>" alt="">
                    </a>
                </div>
                <div class="caption">
                    <h2 class="caption__title"><?= $movie["title"] ?></h2>
                    <p class="caption__description"><?= implode(", ", $movie["genres"]) ?></p>
                </div>

            <?php
            }
            ?>
        </div>

    </div>

</body>

</html>