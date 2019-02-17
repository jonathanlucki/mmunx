<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: header.php
 * Purpose: Template for application header
 * Created: 08/07/18
 * Last Modified: 17/02/19
 */
?>

    <!DOCTYPE html>
    <html lang="en">


    <head>

        <!-- Meta tags -->
        <meta charset="UTF-8">
        <title>MMUNx</title>
        <meta name="description" content="FIX LATER">
        <meta name="author" content = "Jonathan Lucki">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Set favicon -->
        <link rel="shortcut icon" href="<?php echo getLocalFilePath('favicon.ico') ?>" type="image/x-icon">

        <!-- Load bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- Load CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo getLocalFilePath('main.css') ?>">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo CONFIG['gtag_id'] ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo CONFIG['gtag_id'] ?>');
        </script>

    </head>

    <body>