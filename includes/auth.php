<?php
function checkLogin() {
    if (!isset($_SESSION["user_id"])) {
        echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
        exit();
    }
}
function checkAdmin() {
    checkLogin();
    if ($_SESSION["role"] !== "admin") {
        echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/index.php";</script>';
        exit();
    }
}
?>