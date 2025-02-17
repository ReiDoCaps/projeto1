<?php
class Url {
    public static function redirecionar($url) {
        header('Location: ' . URLROOT . '/' . $url);
        exit();
    }
}
?>
