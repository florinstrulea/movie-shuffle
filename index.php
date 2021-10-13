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
include("templates/header.php");
?>



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


<?php
include("templates/footer.php")
?>