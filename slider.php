<?php
    require_once 'connection.php';
   
?>
<div class=""></div>

<section class="hs-slider single flexslider basic"
         data-auto="true"
         data-effect="fade"
         data-navi="true"
         data-pager="true"
         data-slide-speed="5000"
         data-animation-speed="1000"
  >
    <?php
        $slid=mysql_query("select * from addbanner where active=1");
        while($slide=mysql_fetch_array($slid))
        {
    ?>
    <ul class="slides">
        <li class="img img-responsive" style="background-image: url('seller/<?php echo $slide[4]; ?>')" data-ht-parallax="500">
            <div class="overlay"></div>
            <div class="slide-content-wrapper container">
                <div class="slide-content">
                    <h3 class="entry-big"><?php echo $slide[3]; ?></h3>
<!--                    <p class="entry-small">10 RECIPES EVERY WEEK UPDATES</p>-->
<!--                    <a class="entry-button" href="recipe_index.html">SEE ALL RECIPES</a>-->
                </div>
            </div>
        </li>
       
    </ul>
    <?php
        }
    ?>
</section>