<?php
require_once "../config.php";
require_once 'main/header.php';

$limit = 6;
if (isset($_GET["page"])) {
    $count = 0;
    $page  = $_GET["page"];
} else {
    $count = 0;
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$result = mysqli_query($link, "SELECT * FROM survivor_stories WHERE state='Approved' AND remove=0 ORDER BY story_id ASC LIMIT $start_from, $limit");


?>




<style>
    .like {
        width: 70px;
        height: 70px;
        background: url("https://abs.twimg.com/a/1446542199/img/t1/web_heart_animation.png") no-repeat;
        background-position: -20px;
        cursor: pointer;
    }

    .anim-like {
        background-position: -2820px -14px;
        transition: background 1s steps(28);
    }

    .anim {
        background-position: -3529px 0;
        transition: background 1s steps(55);
    }
</style>
<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Stories of Survival</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Stories of Survival</li>
            </ul>
        </div>
    </div>
</section>


<!-- Causes Section Four -->
<section class="causes-section-four">
    <div class="auto-container">
        <div class="cause-wrapper">

            <div class="row">

                <?php

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $count++;


                ?>
                        <div class="col-lg-4 col-md-6 news-block-two style-three ">
                            <div class="inner-box wow fadeInUp card" data-wow-delay="200ms" style="border: none;">
                                <div class="image">
                                    <a href="#">
                                        <?php if ($count == 1) { ?>
                                            <img src="../../images.png" alt="">
                                        <?php } ?>

                                        <?php if ($count == 2) { ?>
                                            <img src="../../images2.png" alt="">
                                        <?php } ?>

                                        <?php if ($count == 3) { ?>
                                            <img src="../../images3.png" alt="">
                                        <?php } ?>

                                        <?php if ($count == 4) { ?>
                                            <img src="../../images4.png" alt="">
                                        <?php } ?>

                                        <?php if ($count == 5) { ?>
                                            <img src="../../images5.png" alt="">
                                        <?php } ?>

                                        <?php if ($count == 6) { ?>
                                            <img src="../../images6.png" alt="">
                                        <?php } ?>
                                    </a>

                                    <div class="post-meta-info">
                                        <a href="#"><span class="flaticon-heart-2"></span> <span id="<?php echo $row['story_id'] ?>"><?php echo $row['hearts'] ?></span></a>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="wrapper-box">
                                        <div class="date">
                                            <span class="flaticon-clock"></span> <?php echo date('d M Y ', strtotime($row['created_at'])); ?>
                                            <button id="hearts" data-id="<?php echo $row['story_id'] ?>"  style="background-color: white;" class="float-right">
                                            <i  id="btn<?php echo $row['story_id'] ?>" class="fa fa-heart-o " style="font-size: x-large;color: #e91849;"> </i>
                                            </button>



                                        </div>
                                        <h4><a href="#">
                                                <?php

                                                if ($row['anonymous'] == "Yes") {
                                                    echo "Her Story";
                                                } else {
                                                    $result_name = mysqli_query($link, "SELECT name FROM users WHERE id='" . $row['survivor_id'] . "'");
                                                    $data_name = mysqli_fetch_assoc($result_name);
                                                    echo explode(" ", $data_name['name'])[0] . "'s Story";
                                                }

                                                ?></a></h4>
                                        <p style="line-height: 25px;color: #a6a6a6;"><?php
                                                                                        $story_id = $row['story_id'];
                                                                                        echo substr($row['story'], 0, 40) . "... <a href='read_more.php?story_id=" . $story_id . "'>Read More</a>";


                                                                                        ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php }
                } else { ?>
                    <div class="col-12 my-5 text-center font-weight-bold">No Stories are avaliable at the moment</div>

                <?php } ?>



            </div>

        </div>

     


<?php
if (mysqli_num_rows($result) > 0) {
                    $result_db = mysqli_query($link, "SELECT COUNT(story_id) FROM survivor_stories WHERE state='Approved' AND remove=0");
                    $row_db = mysqli_fetch_row($result_db);
                    $total_records = $row_db[0];
                    $total_pages = ceil($total_records / $limit);
                    /* echo  $total_pages; */
                    $pagLink = "<div class='row'  mt-3'><ul class='pagination mx-auto'>";
                    if ($page == 1) {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a class='page-link ' style='pointer-events: none; cursor: default; color:#666666' aria-disabled='true' >Previous</a></li>";
                    } else {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='read.php?page=" . ($page - 1) . "' class='page-link' >Previous</a></li>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            $pagLink .= "<li class='page-item active' style='font-size:15px;width:30px;' ><a class='page-link active' href='read.php?page=" . $i . "'>" . $i . "</a></li>";
                        } else {
                            $pagLink .= "<li class='page-item ' style='font-size:15px;width:30px;' ><a class='page-link active' href='read.php?page=" . $i . "'>" . $i . "</a></li>";
                        }
                    }

                    if ($page == $total_pages) {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a aria-disabled='true' style='pointer-events: none; cursor: default; color:#666666'class='page-link ' >Next</a></li>";
                    } else {
                        $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='read.php?page=" . ($page + 1) . "' class='page-link ' >Next</a></li>";
                    }


                    echo $pagLink . "</ul></div>";
                  }  ?>
    </div>
    </div>
</section>



   
         <!-- Main Footer -->
          <footer class="main-footer">
            <div class="auto-container">
             
                <div class="footer-bottom">
                    <div class="left-content">
                    <div class="icon"><img src="../assets/images/logo.png" alt=""></div>

                        <div class="copyright-text"><a href="#">Copyright © SHE MAtters 2021</a>
                        </div>
                    </div>
                  
                </div>
            </div>
        </footer>

        <!--Scroll to top-->

    </div>
    <!--End pagewrapper-->




  <!-- JS -->
  <script src="../assets/main/js/jquery.js"></script>
    <script src="../assets/main/js/popper.min.js"></script>
    <script src="../assets/main/js/bootstrap.min.js"></script>
    <script src="../assets/main/js/TweenMax.min.js"></script>
    <script src="../assets/main/js/wow.js"></script>
    <script src="../assets/main/js/owl.js"></script>
    <script src="../assets/main/js/appear.js"></script>
    <script src="../assets/main/js/swiper.min.js"></script>
    <script src="../assets/main/js/jquery.fancybox.js"></script>
    <script src="../assets/main/js/menu-nav-btn.js"></script>
    <script src="../assets/main/js/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="../assets/main/js/script.js"></script>





<script>
    var span = $('.heart');

    $('.btn').click(function(e) {
        if (span.hasClass('fa fa-heart-o'))
            span.removeClass('fa fa-heart-o').addClass('fa fa-heart');
        else
            span.removeClass('fa fa-heart').addClass('fa fa-heart-o');
    });
</script>


<script>

$(document).on("click", "#hearts", function(e) {
    e.preventDefault();
    var id = $(this).data('id');
      var x= document.getElementById('btn'+id);
    
    if(x.classList.contains('fa-heart-o')){
      x.classList.remove('fa-heart-o');
      x.classList.add('fa-heart');

    
      var action ='like';
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'like_action.php',


            data: {
                story_id: id,
                action: action

            },
            success: function(data) {
                if(data!='ERROR'){


                     document.getElementById(id).innerHTML = data;                     
                 }
            }
        });
  }


  else if(x.classList.contains('fa-heart')){
      x.classList.remove('fa-heart');
      x.classList.add('fa-heart-o');

      var action ='unlike';
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'like_action.php',

            data: {
                story_id: id,
                action: action
            },
            success: function(data) {
                if(data!='ERROR'){
                 document.getElementById(id).innerHTML = data;           
                     }
            }
        });
  }
 
});
</script>



</body>


</html>