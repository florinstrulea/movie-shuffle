<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);
include("templates/functionPicture.php");
include("templates/header.php");
?>



<?php
foreach ($movies as $movie) {
    $movieEdit = spaceToDash($movie);
?> <figure class="image">
        <a href="movie.php?id=<?= $movie["id"] ?>">
            <img src="img/poster/<?= $movieEdit["title"] . "." . "jpg" ?>" alt="">
        </a>
    </figure>
    <figcaption class="caption">
        <h2 class="caption__title"><?= $movie["title"] ?></h2>
        <p class="caption__description"><?= implode(", ", $movie["genres"]) ?></p>
    </figcaption>



<?php
}
?>




<?php
include("templates/footer.php")
?>