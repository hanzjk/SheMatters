<?php
require_once 'header.php';


$query_complaint = "SELECT state, count(*) as number FROM complaints GROUP BY state";
$result_complaint = mysqli_query($link, $query_complaint);

$query_complaint = "SELECT state, count(*) as number FROM complaints WHERE police_id='".$police_id."' GROUP BY state";
$result_complaint = mysqli_query($link, $query_complaint);

$query_complaint = "SELECT state, count(*) as number FROM complaints WHERE police_id='".$police_id."' GROUP BY state";
$result_complaint = mysqli_query($link, $query_complaint);

$category = mysqli_query($link, "SELECT DISTINCT title, COUNT(title) as count FROM complaints GROUP BY title ORDER BY count DESC");


?>

<style>
    .card {
        box-shadow: 0 0 15px 1px rgba(201, 194, 194, 0.4);

    }
    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }

    .scroll {
    max-height: 600px;
    overflow-y: auto;
}



    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 30px 0;
        padding-left: 30px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #da265c;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .status {
        border-radius: 50px;
        line-height: 20px;
        font-size: 12px;
        color: #fff;
        font-style: normal;
        padding: 4px 10px;
        margin-left: 5px;
        margin-top: -5px;
        border: none;
    }

    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #C8C8C8;
    }


    ul.timeline1>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid blue;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .scroll {
        max-height: 600px;
        overflow-y: auto;
    }
</style>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['State', 'Number'],
            <?php
            while ($row_compalint = mysqli_fetch_array($result_complaint)) {
                if($row_compalint["state"]=='Ongoing'){
                    $state='New';
                }

                else if($row_compalint["state"]=='Ongoing_Currently'){
                    $state='Ongoing';
                }
                else{
                    $state='Closed';
                }
                echo "['" . $state . "', " . $row_compalint["number"] . "],";
            }
            ?>
        ]);
        var options = {
            pieHole: 0.5,
            chartArea: {
                left: 10,
                top: 20,
                width: "100%",
                height: "100%"
            },
            colors: ['#002D62', '#4B9CD3', '#48D1CC', '#6F00FF']




        };
        var chart = new google.visualization.PieChart(document.getElementById('complaints'));
        chart.draw(data, options);
    }
</script>


</script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['No of Complaints', 'Category'],


            <?php
            while ($row_type = mysqli_fetch_array($category)) {
                echo "['" . $row_type["title"] . "', " . $row_type["count"] . "],";
            }
            ?>


        ]);

        var options = {
            bar: {
                groupWidth: "15%"
            },
            legend: {
                position: "none"
            },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('complaint_category'));

        chart.draw(data, options);
    }
</script>





<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">


<div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
        <p class="font-weight-normal mb-2 text-muted"><?php echo date("F j, Y, g:i a"); ?></p>
       <a href="admin_messages.php">

      <?php  
      $sql = "SELECT  COUNT(msgID)  FROM admin_message_police WHERE police_id='" . $police_id . "' AND seen='0'";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(msgID)"]; ?>
     

     
     <button type="button" class="btn btn-info">
 Admin Messages
  
  <?php if($Count>0) { ?>
  <span class="badge badge-danger"><?php echo $Count ?></span>
  <?php } ?>
</button>
      
       </a>

    </div>
</div>



<div class="row mt-4">
    <div class="col-md-4">
        <a href="new_complaints.php" style="text-decoration: none;">
        <div class="card" style="background-color: #2522af; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-folder-edit primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(complaint_id)  FROM complaints WHERE police_id='" . $police_id . "' AND state='Ongoing'";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(complaint_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span> New Complaints </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>


    <div class="col-md-4">
        <a href="ongoing_complaints.php"  style="text-decoration: none;">
        <div class="card" style="background-color: #870d92; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="mdi mdi-file-document primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(complaint_id)  FROM complaints WHERE police_id='" . $police_id . "' AND state='Ongoing_Currently' ";
                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(complaint_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span>Ongoing Complaints</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>


    <div class="col-md-4">
        <a href="closed_complaints.php"  style="text-decoration: none;">
        <div class="card" style="background-color: #19bb21; color: white;  box-shadow: 2px 2px 10px #DADADA; border-radius: 5px;">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="fa fa-check-circle-o primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <?php

                            $sql = "SELECT  COUNT(complaint_id)  FROM complaints WHERE police_id='" . $police_id . "' AND state='Closed'";

                            $result = mysqli_query($link, $sql);
                            $inq_count1 = mysqli_fetch_assoc($result);
                            $Count = $inq_count1["COUNT(complaint_id)"];


                            ?>
                            <h3><?php echo $Count ?></h3>
                            <span>Closed complaints</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>


</div>




<div class="row">
    <div class="col-lg-7">
        <div class="card scroll">
        <div id="style-2">

<div class="card-body">

    <p style="font-size: 15px;font-weight: bold;">NEW MESSAGES</p>
    <hr>


    <?php

    $sql_reply = "SELECT * FROM inquiry_police WHERE seen=0 AND reply IS NOT NULL AND complaint_id IN (SELECT complaint_id FROM complaints WHERE state='Ongoing_Currently' AND police_id='".$police_id."') ";
    $result_reply = mysqli_query($link, $sql_reply);
    $num_rows = mysqli_num_rows($result_reply);

    if ($num_rows > 0) { ?>


        <ul class="timeline timeline1">
            <?php

          

            while ($row_reply = mysqli_fetch_array($result_reply)) {
                $sql_user = "SELECT * FROM users WHERE  id IN (SELECT complainant_id FROM complaints WHERE complaint_id='" . $row_reply['complaint_id'] . "')";
                $records_user = mysqli_query($link, $sql_user);
                $data_user = mysqli_fetch_assoc($records_user);
                $result_P = $link->query("SELECT photo FROM users WHERE  id='" . $data_user['id'] . "'");
      
                            $sql_s = "SELECT * FROM complaints WHERE  complaint_id='" . $row_reply['complaint_id'] . "'";
                            $records_s = mysqli_query($link, $sql_s);
                            $data_s = mysqli_fetch_assoc($records_s);             

            ?>



                <li>
                
                   
                    <span class="float-right" style="color: gray;"> <?php echo date('d M Y H:i:s', strtotime($row_reply['reply_date'])); ?></span>
                
                    <a href="inquires.php?complaint_id=<?php echo $row_reply['complaint_id']  ?>&action=seen" style="color: black;text-decoration: none;">

                   <span> <?php if ( $data_user['photo'] != null) { ?>
                      
                      <img  style="width: 30px;border-radius: 50%;" src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($data_user['photo']); ?>" />
          
              <?php } else { ?>
                  <img src="../user/assets/images/user2.jpg" alt="Image" style="width: 30px;border-radius: 50%;">
              <?php } ?></span>&nbsp;<span style="font-weight: bold;"><?php echo $data_user['name'] ?> </span>
                    </a>
<br>
              <span ><?php echo $data_s['title'] ?></span>
                </li>

            <?php } ?>

        </ul>


    <?php } else { ?>
        <div class="text-center">No New Messages</div>

    <?php } ?>
</div>
</div>
        </div>
    </div>


    <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">STATISTICS ON FILED COMPLAINTS</p>
                    <hr>

                    <div id="complaints" style="width: 100%;"></div>
                </div>

            </div>
        </div>



</div>

<div class="row">
<div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p style="font-size: 15px;font-weight: bold;">COMPLAINING RATE BASED ON CATEGORY</p>
                    <hr>

                    <div id="complaint_category" style="width: 100%;"></div>
                </div>

            </div>
        </div>

</div>









<?php
require_once 'footer.php';
?>