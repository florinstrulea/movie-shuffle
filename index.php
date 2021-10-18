<?php
// $json = file_get_contents("movies.json");
// $movies = json_decode($json, true);

include("templates/functionPicture.php");
include("templates/header.php");
// On se connecte à ma base de données

$dsn = "mysql:host=localhost;dbname=mymovies";
$db = new PDO($dsn, "root");

// ==========On affiche tous les films
//$query = $db->query("SELECT * FROM movies");
//$movies = $query->fetchAll(PDO::FETCH_ASSOC);

//On verifie que le lien de la page est present

if (isset($_GET["page"]) && !empty($_GET["page"])) {
    $pageOn = trim(strip_tags($_GET["page"]));
} else $pageOn = 1;

// === On compte le nombre des films dans la base
$query = $db->prepare("SELECT COUNT(id) as movieCount from movies");
$query->execute();
$movNum = $query->fetch();

// === On defini des variables pour  la selection de nombre des films
$numMov = $movNum["movieCount"];
$moviesOnPage = 10;
$numPages = ceil($numMov / $moviesOnPage);
$startingFrom = ($pageOn * $moviesOnPage) - $moviesOnPage;

// === On selecte 10 films par page
$query = $db->prepare("SELECT * FROM movies LIMIT $startingFrom, $moviesOnPage");
// $query->bindValue(":startingFrom", $startingFrom, PDO::PARAM_INT);
// $query->bindValue(":moviesOnPage", $moviesOnPage, PDO::PARAM_INT);
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<?php
// foreach ($movies as $movie) {
//     $query = $db->prepare("INSERT INTO movies (title, genres, description, releaseDate, duration,video)  values (:title, :genres, :description,:releaseDate, :duration, :video)");
//     $query->bindValue(":title", $movie["title"]);
//     $query->bindValue(":genres", implode(", ", $movie["genres"]));
//     $query->bindValue(":description", $movie["description"]);
//     $query->bindValue(":releaseDate", $movie["releaseDate"]);
//     $query->bindValue(":duration", $movie["duration"]);
//     $query->bindValue(":video", $movie["video"]);
//     $query->execute();
// }

foreach ($movies as $movie) {
    $movieEdit = spaceToDash($movie);
?> <figure class="image">

        <img src="img/poster/<?= $movieEdit["title"] . "." . "jpg" ?>" alt="">

        <div class="gradient"></div>
        <a href="movie.php?id=<?= $movie["id"] ?>">
            <figcaption class="caption">
                <h2 class="caption__title"><?= $movie["title"] ?></h2>
                <p class="caption__description"><?= $movie["genres"] ?></p>
            </figcaption>
        </a>
    </figure>





<?php
}

?>
</div>
<div class=" container buttons">
    <p>bla bla</p>
</div>



<?php
include("templates/footer.php")
?>