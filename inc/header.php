<?php
define("DOMAIN","http://localhost/Evangelism-email-marketing--PHP");
session_start();
include ("db_conn.php");
include ("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Evangelism</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="UTF-8" />
  <meta name="keywords" content="" />

   <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include jQuery UI library -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Optional: Include jQuery UI theme for styling -->
  <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
  <script src="<?= DOMAIN . "/assets/js/script.js" ?>"></script>
  <style>
    .btn-img {
      width: 40px;
    }

    #ui-datepicker-div{
      z-index: 99999 !important;
    }

    .cursor-pointer {
      cursor: pointer;
    }
  </style>
</head>

<body>