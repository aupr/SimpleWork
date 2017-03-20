<?php
/**
 * Created by PhpStorm.
 * User: Aman
 * Date: 2/14/2017
 * Time: 10:58 PM
 */
if (isset($_POST['dnl'])) {
    $downloader = new downloader(DIR_FILE);
    //$downloader->download('self/sw.aii', 'aman.ai');
    $downloader->flyload(" ", 'myname.txt');
}


//echo "<hr>";
//echo "WELCOME TO SIMPLE WORK!";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="file/self/sw.ai">Download</a>
    <form action="" method="post">
        <button type="submit" name="dnl" value="true">download</button>
    </form>
</body>
</html>