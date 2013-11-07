<?
function returnFilesInDirectory($addr)
{
  $files = scandir($addr);
  $arr = array();
  foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
      $arr[] = explode(".", $file)[0];
    }
  }
  return $arr;
}

$block = $_GET["block"];
?>
<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
  <meta charset="UTF-8">
  <title><? if (!isset($block)) {
      echo "springboard";
    } else {
      echo $block;
    } ?></title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="css/start.css"/>
  <style type="text/css">
    .spb-block {
      padding: 50px 20px;
    }

    .spb-list {
      width: 300px;
      margin: 50px auto 50px;
    }

    .spb-tomain {
      position: fixed;
      top: 0;
      left: 0;
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 20px;
      text-decoration: none;
    }

    .spb-tomain:hover {
      background: #dfdfdf;
      cursor: pointer;
    }
  </style>
</head>
<body>
<? if (isset($block)) { ?><a href="/" class="spb-tomain">&larr;</a><? } ?>
<div class="wrapper">
  <div class="container">
    <?

    if (isset($block)) {
      ?>

      <div class="spb-block">
        <? include "./html/" . $block . ".html"; ?>
      </div>
    <?
    } else {
      $files = returnFilesInDirectory("./html/");
      ?>
      <div class="spb-list">
        <h5>Блоки на проекте</h5>
        <ul>
          <?
          foreach ($files as $file) {
            echo "<li><a href='?block=" . $file . "'>" . $file . "</a></li>";
          }
          ?>
        </ul>
      </div>
    <?
    }
    ?>
  </div>
</div>
</body>
</html>