<!DOCTYPE HTML>

<html lang="ko">

<head>
        <meta charset="UTF-8">

        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        
        <link rel="stylesheet" type="text/css" href="inc/css/style.css" />
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="inc/js/script.js"></script>
        <title>::: Trend :::</title>
        
        <script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-49160627-1', 'bogojaja.com');
			ga('send', 'pageview');
		
		</script>
</head>

<body onload="prevent();" onpageshow="if (event.persisted) prevent();" onunload="">

    <nav>
        <?php $url=basename($_SERVER['PHP_SELF']); ?>
        <a id="nav_home" href="javascript:void(0)" class="info" >Home</a>
        <a id="nav_issue" href="javascript:void(0)" class="info">이슈</a>
        <a id="nav_news" href="javascript:void(0)" class="info">뉴스</a>
        <a id="nav_ent" href="javascript:void(0)" class="info">연예</a>
        <a id="nav_sport" href="javascript:void(0)" class="info">스포츠</a>
    </nav>
    <header>
    	<?php
   //  		require_once 'inc/mobile_detect/Mobile_Detect.php';
			// $detect = new Mobile_Detect;
			
			// if ( $detect->isMobile() )
			// {
			// 	//echo "<a href='javascript:void(0)' id='beta_btn'><span id='beta'>Beta</span></a><a href='javascript:void(0)' id='header_btn'><h1>BoGoJaJa</h1>";
			// 	echo "<a href='javascript:void(0)' id='header_btn'><img src='inc/title_eng.png' width='250' id='title'/></a>";
			// 	echo "<h2>find your <span id='sex_mark'>♂ ♀</span></h2>";
			// }
			// else
			// {
			// 	echo "<a href='javascript:void(0)' id='beta_btn'><img src='inc/title_moon.png' id='beta'/></a><a href='javascript:void(0)' id='header_btn'><img src='inc/title.png' id='title'/></a>";
			// 	echo "<div style='padding: 10px 0 0 60px;'><img src='inc/title_eng.png' width='180'/></div>";
			// }
    	?>
        <!-- <a href="javascript:void(0)" id="beta_btn"><span id="beta">Beta</span></a><a href="javascript:void(0)" id="header_btn"><h1>BoGoJaJa</h1></a> -->
        
        <div id="header_date">
            <div id="date_left"><</div>
            <div id="date_mid">
                <input type="date" name="date" id="date" value="<?php print date("Y-m-d") ?>" min="2014-12-01">
            </div>
            <div id="date_right">></div>
        </div>

        <input type="hidden" name="current_item" id="current_item" value="home" />
        <input type="hidden" name="current_date" id="current_date" />

        <div id="siteloader">
            <div id="iframe_close_btn">
                Close
            </div>
        </div>

    </header>
    