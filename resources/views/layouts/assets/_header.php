<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= WEBSITE_NAME ?>, Régie Publicitaire, Import-Export, Formation, Etude, Conseil, Production Audiovisuelle & Artistique, Evenementiel & Hotesse, Multi-Service.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="©<?= WEBSITE_NAME ?> - DEV-Afrika">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $MEDIA . '/uses/i-logo.png'; ?>">
    <!-- Page title -->
    <title><?= eaTitle($match['name']) . ' • ' . WEBSITE_NAME; ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&family=Rubik:wght@400;500;700&family=Spartan:wght@400;700;900&display=swap" rel="stylesheet">
    
    <!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="<?= CDN . 'fontawesome/css/all.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= CDN . 'animate/animate.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= CDN . 'tinySlider/tiny-slider.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= CDN . 'aos/aos.css'; ?>">

    <!-- Thème CSS -->
    <link rel="stylesheet" type="text/css" href="<?= $CSS . '/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= $CSS . '/colors/dev.css'; ?>">
    
    
</head>
<body>
<?php if(isset($_SESSION['toast']['msg'])) { include_once PARTIALS . '/toasts/__flash.php'; } ?>
