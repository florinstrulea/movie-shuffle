<?php
function spaceToDash($film)
{
    strtolower($film["title"]);
    if (str_contains($film["title"], " ")) {
        $film["title"] = str_ireplace(" ", "-", $film["title"]);
    }
    return $film;
}
