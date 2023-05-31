<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$args = $_SERVER["REQUEST_URI"];
$args = str_replace("&amp;","&",htmlspecialchars($args));
if(!empty($args)) {
    $contents = file_get_contents("https://github-readme-stats.vercel.app/".$args);
    $file = base64_encode(str_replace($contents,"/","_")).".svg";
    if(str_contains($contents, "Something went wrong")) {
        print(file_get_contents($file));
    } else {
        print($contents);
        $f = fopen($file, "w");
        fwrite($f, $contents);
        fclose($f);
    }
}
?>