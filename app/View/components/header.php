<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo africa</title>
    <link rel="stylesheet" href=<?= ASSETSROOT . "css/all.min.css" ?>>
    <link rel="stylesheet" href=<?= ASSETSROOT . "css/fontawesome.min.css" ?>>
    <link rel="stylesheet" href=<?= ASSETSROOT . "css/style.css" ?>>
</head>

<body>

    <header class="flex justify-between container py-5">
        <a class="text-primary font-bold text-2xl" href="<?= URLROOT ?>">GEOAFRICA</a>
        <?php
            if (isLoggedIn() && user()->isAdmin()) {
        ?>
            <a href="<?= URLROOT . "country/create" ?>" class="bg-primary py-1 px-3 text-white rounded-lg flex gap-2 items-center"><i class="fa fa-plus"></i>Add Country</a>
        <?php
            }
        ?>
        <?php
            if (isLoggedIn()) {
        ?>
            <form action="<?= URLROOT . 'logout' ?>" method="POST">
                <input type="hidden" name="csrf_token" value="<?= generateCsrfToken() ?>">
                <button class="bg-red-500 px-2 py-1 rounded-lg text-white">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        <?php
            }
        ?>
    </header>