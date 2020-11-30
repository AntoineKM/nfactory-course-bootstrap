<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LabFactory</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light text-dark">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="./">LabFactory</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '' ?>">
                    <a class="nav-link" href="./">Accueil</a>
                </li>
                <li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : '' ?>">
                    <a class="nav-link" href="./contact.php">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Theme
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" id="toggle-light">Light</a>
                        <a class="dropdown-item" href="#" id="toggle-dark">Dark</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>