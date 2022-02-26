<?php
require_once 'conection.php';
?>
<div class="digit" style="float: left;">
  <?php
    $digit = rand(0,9);
    echo $digit;
    $str = $digit;
    ?>
</div>

<div class="capalpha" style="float: left;">
    <?php
    $cap = chr(rand(65, 90));
    echo $cap;
    $str = $str . $cap;
    ?>
</div>

<div class="twodigit" style="float: left;">
    <?php
    $twodig = rand(0,9);
    echo $twodig;
    $str = $str . $twodig;
    ?>
</div>

<div class="smallalpha" style="float: left;">
    <?php
    $small = chr(rand(97,122));
    echo $small;
    $str = $str . $small;
    ?>
</div>

<div class="smallalph" style="float: left;">
    <?php
    $small = chr(rand(97,122));
    echo $small;
    $str = $str . $small;
    
    ?>
</div>
<div class="twodig" style="float: left;">
    <?php
    $twodig = rand(10,99);
    echo $twodig;
    $str = $str . $twodig;
    $_SESSION[cap] = $str;
    ?>
</div>
<div style="clear:both;" ></div>