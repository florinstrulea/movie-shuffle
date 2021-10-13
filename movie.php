<?php
include("templates/header.php");
include("templates/functionPicture.php");
function minuteToHours($film)
{
    $durationHours = intdiv($film["duration"], 60);
    $durationMinutes = $film["duration"] % 60;
    $durationCalc = $durationHours . "h" . " " . $durationMinutes . "minutes";
    return $durationCalc;
}
function frenchDate($film)
{
    $timestamp = strtotime($film["releaseDate"]);
    $release = date("d/m/Y", $timestamp);
    return $release;
}
?>
<hr>
<?php
if (isset($_GET["id"])) {
    $json = file_get_contents("movies.json");
    $movies = json_decode($json, true);
    foreach ($movies as $movie) {
        $movieEdit = spaceToDash($movie);
        $duration = minuteToHours($movie);
        $releaseDate = frenchDate($movie);
        if ($movie["id"] == $_GET["id"]) { ?>
            <div class="page">
                <div class="image-container">
                    <img src="img/poster/<?= $movieEdit["title"] . "." . "jpg" ?>" alt="">
                </div>
                <div class="description">
                    <p class="description__year"><?= substr($movie["releaseDate"], 0, 4) ?></p>
                    <h1 class="description__title"><?= $movie["title"] ?></h1>
                    <p class="description__description"><?= $movie["description"] ?></p>
                    <p class="description__genre"><?= implode(", ", $movie["genres"]) ?></p>
                    <p class="description__details"><span class="description__duration"><?= $duration ?> - </span><span class="description__release"><?= $releaseDate ?></span></p>
                    <div class="button-container">
                        <a href="<?= $movie["video"] ?>" class="button">Bande Annonce</a>
                    </div>

                </div>
            </div>

<?php
        }
    }
}
include("templates/footer.php") ?>