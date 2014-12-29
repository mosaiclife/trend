
        <div class="form-wrapper">
            
            <?php

            	include ('inc/php/dbconnect.php');
                
                $query = " SELECT  KEYWORD
                               ,   COUNT
                           FROM    (
                                       SELECT  KEYWORD
                                               -- ,   SUM(RANK)
                                               ,   COUNT(*) AS COUNT
                                               -- ,   SUM(RANK_VALUE)
                                               -- ,   ROUND(SUM(RANK_VALUE) / COUNT(*))
                                               -- ,   SUM(RANK) / COUNT(*)
                                               -- ,   AVG(RANK)
                                       FROM    REAL_SEARCH_WORD
                                       WHERE   SEARCH_DATE = DATE_FORMAT(NOW(), '%Y%m%d')
                                          AND  SEARCH_SE = '1'
                                       GROUP BY SITE_SE, SEARCH_SE, KEYWORD
                           ) T1
                            ORDER BY 2 DESC
                           LIMIT 1,10";
                
                $result = $mysqli->query($query);
                
                
            ?>
            
            <div id="result-wrap">
                <?php
                    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        print $row["KEYWORD"]."<BR/>";
                    }
                ?>
            </div>
            
            
            <button class="button" id="result_btn">Check Again</button>
            
            
        </div>
