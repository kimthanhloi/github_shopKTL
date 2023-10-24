<?php

// session_start();

if (isset($_SESSION["dangky"])) {
  unset($_SESSION["dangky"]);
  unset($_SESSION["cart"]);
  Header('Location: /index.php?pages=product_detail&action=layout&html=home');
  setcookie("user", '', time() + 1, "/");
  setcookie("pass", '', time() + 1, "/");
}
?>