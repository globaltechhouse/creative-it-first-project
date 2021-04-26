<?php 
$con_unseen = "SELECT COUNT(*) as totalcon, id, name, message,status FROM messages WHERE status=1 ORDER BY id DESC";

$con_unseenloop = "SELECT * FROM messages WHERE status=1 ORDER BY id DESC";
$con_unseenloop_querys = mysqli_query($connection,$con_unseenloop);

$con_querys = mysqli_query($connection,$con_unseen);

$con = mysqli_fetch_assoc($con_querys);


?>
<!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (<?php echo $con['totalcon']; ?>)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">

            <!-- loop starts here -->
            <?php foreach ($con_unseenloop_querys as $key => $wsaas) : ?>            
            <a href="" class="media-list-link">
              <div class="media">                
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?= $wsaas['name'];?></p>
                  <p class="tx-13 mg-t-10 mg-b-0">
                    <?php
                    $text = $value['message'];
                    $limit = substr($text, 0, 60);
                    echo $limit;
                    ?>
                  </p>
                </div>
              </div><!-- media -->
            </a>   
            <?php endforeach; ?>                     
            <!-- loop ends here --> 

          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">

            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="./assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->

          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
  