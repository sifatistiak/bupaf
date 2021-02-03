<div class="container-fluid mtb-margin-top">
  <div class="row">
    <div class="col-md-12">
      <?php
      include '../include/config.php';
      $limit = 3;
      /*How may adjacent page links should be shown on each side of the current page link.*/
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM `news`";
      $res = mysqli_fetch_object(mysqli_query($con, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);


      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
//

      $query  = "select * from `news` limit $offset, $limit";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_object($result)) {
          echo '<div class="row" style="color: white; padding:1rem; margin-top:2rem; background-color:rgb(0,0,0); opacity:0.5;">';
          // echo '<div class="col-md-2">';
          // echo '<img class="col-md-12 w-100 rounded img-fluid" style=" margin: 25% auto 25%; padding-right:0px; padding-left:0px;" src="../assets/img/news/'.$row->image.'" alt="Not Found" onerror=this.src="../assets/img/news/noimg.png">';
          // echo '</div>';
          // echo '<div class="col-md-10" style="">';
          echo '<h6 style="color:#D1B055; "><a style= "color:gold;" href="./news_details.php?news_id='.$row->id.'">'.$row->title.'</a></h6>';
          echo '<p style="text-align: justify;">'.substr($row->details,0,340).'&nbsp;&nbsp;<a href="./news_details.php?news_id='.$row->id.'">Read More...</a></p>';
          // echo '<br>';
          // echo '<p style="text-align: left;">Tags : '.$row->tags.'</p>';
          // echo '</div>';
          echo '</div>';

            }
            echo '<div style="float:right; margin-top:3%">';
      }

      //Here we generates the range of the page numbers which will display.
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) {
          if(($page + $adjacents) < $total_pages) {
            $start = ($page - $adjacents);
            $end   = ($page + $adjacents);
          } else {
            $start = ($total_pages - (1+($adjacents*2)));
            $end   = $total_pages;
          }
        } else {
          $start = 1;
          $end   = (1+($adjacents * 2));
        }
      }

      //If you want to display all page links in the pagination then
      //uncomment the following two lines
      //and comment out the whole if condition just above it.
      /*$start = 1;
      $end = $total_pages;*/
      ?>

      <?php if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <!-- Link of the first page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='?page=1'><<</a>
            </li>
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <!-- Links of the pages with page number -->
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <!-- Link of the next page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='?page=<?php echo $total_pages;?>'>>>
              </a>
            </li>
          </ul>

       <?php } ?>
       <?php mysqli_close($con); ?>
    </div>
    </div>
 </div>
</div>
