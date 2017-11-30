<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Honeypot</title>
</head>
<body>

<!-- Inlog Brute force test -->
<?php
function bruteForcePrevention() {
    empty($_SESSION['timesFailedLogon']) ? $_SESSION['timesFailedLogon'] = 1 : $_SESSION['timesFailedLogon']++;
    $timesFailedLogon = $_SESSION['timesFailedLogon'];
    echo $timesFailedLogon;

    if($timesFailedLogon >= 3) {
        echo 'You\'ve failed to put in correct userdata more than 3 times in a row';
        $timeOutDuration = 0.1 * ($timesFailedLogon * $timesFailedLogon);
        if ($timeOutDuration > 25) {
            $timeOutDuration = 25;
        }
        echo 'Your timeout lasts ' .  $timeOutDuration . ' seconds';
        sleep($timeOutDuration);
    }
}
echo 'fuck';

if (isset($_POST['login_submit'])) {
    $login_uname = $_POST['login_uname'];
    $login_password = $_POST['login_password'];

    if ($login_password === '12345' && $login_uname === 'admin') {
        echo 'You\'ve been logged in';
    } else {
        echo 'Password or username is wrong';
        bruteForcePrevention();
    }
}
?>

<h1>Inlog brute force test</h1>
<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" >
    <label>Inlog naam</label>
    <input type="text" name="login_uname"><br>
    <label>Inlog password</label>
    <input type="password" name="login_password"><br>
    <input type="submit" name="login_submit" value="Log in">

</form>
<!-- / Inlog Brute force test -->
<hr>
<!-- Form CSRF test -->



<!-- / Form CSRF test -->
<hr>
<!-- Search XSS test -->
<h1>Search XSS test</h1>
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
<!-- / Search XSS test -->

</body>
</html>