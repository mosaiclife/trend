
        <div class="info-wrapper">
            
            <?php

            	include ('inc/php/dbconnect.php');

              $SEARCH_SE = $_POST['search_se'];
              $DATE = $_POST['date'];
                
                $query = " SELECT  SEARCH_SE
                             , SEARCH_DATE
                             , SUM(SUM_RANK)
                             , KEYWORD
                             , ROUND(AVG(AVG_RANK),1) AS AVG_RANK
                             , SUM(COUNT)  AS COUNT
                           FROM  DM_TREND
                           WHERE SEARCH_SE = '$SEARCH_SE'
                              AND SEARCH_DATE = '$DATE'
                           GROUP BY SEARCH_SE, SEARCH_DATE, KEYWORD
                           ORDER BY 3 DESC
                           LIMIT 1,20";


                $result = $mysqli->query($query);
                
                
            ?>
            
                <?php

                  $i = 0;

                  while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $i++;
                    // print $i;
                    // print $row["KEYWORD"];
                    // print $row["AVG_RANK"];
                    // print $row["COUNT"]."<BR/>";


                    print '<div class="card">';
                    print '  <div class="card_rank">'.$i.'</div>';
                    print '  <div class="card_main">';
                    //print '     <span class="card_keyword"><a href="http://m.search.daum.net/search?q='.$row["KEYWORD"].'" target="_blank">'.$row["KEYWORD"].'</a><span>';
                    print '     <div class="card_keyword">'.$row["KEYWORD"].'</div>';
                    print '     <div class="card_share">';
                    print '        <img src="inc/img/share.png" width="28"/>';
                    print '     </div>';
                    print '  </div>';
                    print '  <div class="card_footer">';
                    print '      <div class="card_footer_left"></div>';
                    print '      <div class="card_footer_right">';
                    print '          <span class="card_avg_rank">평균 랭킹 : '.$row["AVG_RANK"].'</span>';
                    print '          <span class="card_avg_count">빈도 : '.$row["COUNT"].'</span>';
                    print '      </div>';
                    print '  </div>';
                    print '</div>';
                  }
                ?>
            
            
        </div>
