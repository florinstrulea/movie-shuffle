<?php
//connexion à la base mymovies
$dsn = "mysql:host=localhost;dbname=mymovies";
$db = new PDO($dsn, "root");

// $query = $db->prepare("SELECT * FROM movies ");
// $searchValue = "%" . $_GET["search"] . "%";
// $query->bindParam(":title", $searchValue);
// $query->execute();
// $movies = $query->fetchAll(PDO::FETCH_ASSOC);

//On verifie que le lien de la page est present

if (isset($_GET["page"]) && !empty($_GET["page"])) {
    $pageOn = trim(strip_tags($_GET["page"]));
} else $pageOn = 1;

$searchValue = "%" . $_GET["search"] . "%";

// === On compte le nombre des films dans la base
$query = $db->prepare("SELECT COUNT(id) as movieCount from movies where title LIKE :title");
$query->bindParam(":title", $searchValue);
$query->execute();
$movNum = $query->fetch();

// === On defini des variables pour  la selection de nombre des films
$numMov = $movNum["movieCount"];
$moviesOnPage = 5;
$numPages = ceil($numMov / $moviesOnPage);
$startingFrom = ($pageOn * $moviesOnPage) - $moviesOnPage;

// === On select 10 films par page
$query = $db->prepare("SELECT * FROM movies where title LIKE :title LIMIT $startingFrom, $moviesOnPage");
$query->bindParam(":title", $searchValue);
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);



//inclure le template header
include("templates/functionPicture.php");
include("templates/header.php");
?>
<div class="container">
    <p> Nous avons trouvée <?= $numMov ?> films qui correspondent à votre recherche</p>
</div>
<div class="container movies">
    <?php

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
<div class=" container buttons d-flex justify-content-center">
    <?php
    for ($page = 1; $page <= $numPages; $page++) {
    ?>
        <a href="./search.php?search=<?= $_GET["search"] ?>&page=<?= $page ?>" class="pButton <?= ($pageOn == $page) ? "btn disabled" : " " ?>"><?= $page ?></a>
    <?php

    }

    ?>

</div>
<?php

include("templates/footer.php")
?>