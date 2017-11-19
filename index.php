<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Honeypot</title>
</head>
<body>

<?php 

if (isset($_GET['search_submit'])) {
    $search = $_GET['search_term'];
    $search = htmlspecialchars($search);
    echo $search;
}

?>

<form method="GET" action="<?= $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="search_term">
    <input type="submit" name="search_submit">
</form>

</body>
</html>