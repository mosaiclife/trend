$(document).ready(function() {

    $(window).bind("pageshow", function(event) {
        if (event.originalEvent.persisted) {
            main_fn();
        }
    });
    



    class_fn("#nav_home", "current");

    // Hidden field set current date
    $("#current_date").val(getDate());
    

    // Header date click Event
    $("#date_left").click(function() {
        var date = $("#date").val();

        var current_item = $("#current_item").val();

        if ( !(current_item == 'home' || current_item == '') )
        {
            go_ajx(current_item, addDate(date, -1));
        }
        
    });
    
    $("#date_right").click(function() {
        var date = $("#date").val();

        var current_item = $("#current_item").val();

        if ( !(current_item == 'home' || current_item == '') )
        {
            go_ajx(current_item, addDate(date, 1));
        }
        
    });
    

    // Header date change Event
    $("#date").change(function() {
        var date = $("#date").val();

        var current_item = $("#current_item").val();

        if ( !(current_item == 'home' || current_item == '') )
        {
            go_ajx(current_item, addDate(date, 0));
        }

    });


    /*
     * Ajax integration function
    */
    
    function go_ajx(page, date) {
        
        if (date == "")
        {
            date = $("#current_date").val();
        }

        // 뷰어 삭제 및 숨기기
        $("embed").remove();
        $("#siteloader").hide();

        switch (page) {
            case "home" :
                ajax_fn("main","0", date);
                $("#current_item").val("home");
                break;
            case "issue" :
                ajax_fn("view","1", date);
                $("#current_item").val("issue");
                break;
            case "news" :
                ajax_fn("view","2", date);
                $("#current_item").val("news");
                break;
            case "ent" :
                ajax_fn("view","3", date);
                $("#current_item").val("ent");
                break;
            case "sport" :
                ajax_fn("view","4", date);
                $("#current_item").val("sport");
                break;
        }

        // date 현재 날짜로 수정
        $("#date").val(date.substr(0,4) + "-" + date.substr(4,2) + "-" + date.substr(6,2));

        

        //ajax_fn(page);
        
        $("nav a").removeClass("current");
        
        if (page == "home") {
            class_fn("#nav_home", "current");
        } else if (page == "issue") {
            class_fn("#nav_issue", "current");
        } else if (page == "faq") {
            class_fn("#nav_faq", "current");
        }
    }
    
    
    
    /*
     * navigation function
    */
    $("#nav_home").click(function() {
        go_ajx("home", "");
    });
    
    $("#nav_issue").click(function() {
        go_ajx("issue", "");
    });
    
    $("#nav_news").click(function() {
        go_ajx("news", "");
    });

    $("#nav_ent").click(function() {
        go_ajx("ent", "");
    });

    $("#nav_sport").click(function() {
        go_ajx("sport", "");
    });
    
    
    
    /*
     * Ajax Function
    */
    function ajax_fn (name, search_se, date) {
        
        $.ajax({
            url: name + '.php',
            type: 'POST',
            data: { search_se : search_se, date : date },
            success: function(result) {
            	
                $("#body-wrapper").children().fadeOut(600, function(){
                    $("#body-wrapper").children().remove();
                    $("#body-wrapper").append(result).children().css("display", "none");
                    $("#body-wrapper").children().fadeIn(900);
                    
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                    // Hidden Field에 date Update
                    $("#current_date").val(date);


                    cardShareClick();
                    cardClickToggle();

                    // if (name == "home")
                    // {
                    //     main_fn();
                    // }
                    // else if(name == "check")
                    // {
                    //     check_fn();
                        
                    // }
                    // else if(name == "result")
                    // {
                    // 	result_fn();
                    // }
                    // else if(name == "faq") {
                        
                    //     // faq toggle
                    //     $(".faq-box").click(function() {
                    //         $(this).children(".faq-answer").slideToggle();
                    //     })
                    // }
                });
                
                //$("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(error) {
                alert(error);
            }
        });
    }
    
    
    /*
     * Add Class
    */
    function class_fn (id, name) {
        $(id).addClass(name);
    }
    

    /*
     * Card Click Toggle Event
    */
    function cardClickToggle () {
            $(".card_keyword").click(function() {
                $(this).parents().children(".card_footer").slideToggle(300);
            });
    }



    /*
     * Card Share Click Event
    */
    function cardShareClick () {
            $(".card_share").click(function() {
                //var keyword = $(this).find(".card_keyword").text();
                var keyword = $(this).parents().children(".card_keyword").text();

                $("#siteloader").css("display", "inline");
                $("#siteloader").append('<embed src="http://m.search.daum.net/search?q='+ keyword + '" style="overflow: hidden; width: 100%; height: 10000px; margin-top: 20px;" />');
                $("#siteloader").css("height", "10000");

                $("html, body").animate({ scrollTop: 0 }, "slow");

         
            $("#iframe_close_btn").click(function() {
                $("embed").remove();
                $("#siteloader").hide();

                $("html, body").animate({ scrollTop: 0 }, "slow");
            })

            });
    }




    /*
     * Date add function
     * Input Type : YYYY-MM-DD
     * Return Type : YYYYMMDD
    */
    function addDate (date, i) {
        yyyymmdd = date.split("-");

        var date = new Date(
            parseInt(yyyymmdd[0], 10),
            parseInt(yyyymmdd[1], 10) - 1,
            parseInt(yyyymmdd[2], 10)
        );

        date.setDate(date.getDate() + i);

        return date.getFullYear() + 
            ("0" + (date.getMonth() + 1)).slice(-2) +
            ("0" + date.getDate()).slice(-2)
    }


    /*
     * Get Current Date function
     * Return Type : YYYYMMDD
    */
    function getDate () {

        var date = new Date();

        return date.getFullYear() + 
            ("0" + (date.getMonth() + 1)).slice(-2) +
            ("0" + date.getDate()).slice(-2)
    }










    
    /*
     * main.php
    */
    function main_fn () {
        
        $("#main_btn").click(function() {
        
        	go_ajx("check");
        })
    }
    
    
    /*
     * loading.php
    */
    function loading_fn () {
        
        $("#main_btn").click(function() {
            go_ajx("check");
        })
    }
    
    
    /*
     * check.php
    */
    function check_fn () {
        $("#check_btn").click(function() {
            var isEmpty = 0;
            
            $("#input_form").find("select").each(function() {
                $(this).css("border", "1px solid #d9d9d9");
                
                /* Select Box 값 입력 안했을때 깜박이면서 테두리 붉은색으로*/
               if ( this.value == "0" ) {
                    $(this).fadeOut(600, function(){
                        $(this).css("border","solid 3px red");
                    }).fadeIn(900);
                    
                    isEmpty = 1;
               }
            });
            
            // submit 방지
            if (isEmpty == 1) {
                return false;
            }
            
            
            // Loading image
            

			$("#body-wrapper").children().fadeOut(600, function(){
                    
                    $("#body-wrapper").append("<div class='form-wrapper'>");
                    
                    
                    
					$(".form-wrapper").append("<img id='loading1' src='inc/loading1.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading2' src='inc/loading2.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading3' src='inc/loading3.png' width='280' style='position:absolute;'/>");
                    $(".form-wrapper").append("<img id='loading4' src='inc/loading4.png' width='280' style='position:absolute;'/>");
                    
                    $("#body-wrapper").append("</div>");
                    
                    
                    $(".form-wrapper #loading1").css("display","none");
                    $(".form-wrapper #loading2").css("display","none");
                    $(".form-wrapper #loading3").css("display","none");
                    $(".form-wrapper #loading4").css("display","none");
                    //setTimeout($("#loading1").css("display","none"), 200);
                    
                    $(".form-wrapper #loading1").show();
                    setTimeout( function(){
                    	$(".form-wrapper #loading1").hide();
                    	$(".form-wrapper #loading2").show();
                    	setTimeout( function(){
                    		$(".form-wrapper #loading1").hide();
                    		setTimeout( function(){
                    			$(".form-wrapper #loading2").hide();
								$(".form-wrapper #loading3").show();
								setTimeout( function(){
	                    			$(".form-wrapper #loading3").hide();
									$(".form-wrapper #loading2").show();
									setTimeout( function(){
		                    			$(".form-wrapper #loading2").hide();
										$(".form-wrapper #loading1").show();
										setTimeout( function(){
			                    			$(".form-wrapper #loading1").hide();
											$(".form-wrapper #loading2").show();
											setTimeout( function(){
				                    			$(".form-wrapper #loading2").hide();
												$(".form-wrapper #loading3").show();
												setTimeout( function(){
													$(".form-wrapper #loading3").hide();
													$(".form-wrapper #loading2").show();
													setTimeout( function(){
						                    			$(".form-wrapper #loading2").hide();
														$(".form-wrapper #loading1").show();
														setTimeout( function(){
							                    			$(".form-wrapper #loading1").hide();
															$(".form-wrapper #loading2").show();
															setTimeout( function(){
								                    			$(".form-wrapper #loading2").hide();
																$(".form-wrapper #loading3").show();
																setTimeout( function(){
									                    			$(".form-wrapper #loading3").hide();
																	$(".form-wrapper #loading4").show();
																}, 150);
															}, 150);
														}, 150);
													}, 150);
					                    		}, 150);
				                    		}, 150);
			                    		}, 150);
		                    		}, 150);
	                    		}, 150);
                    		}, 150);
                    	}, 150);
                    }, 150);
                    
                    
                    
                    setTimeout(function() {go_ajx("result")}, 3200);
            });

            /*

            
			$("#body-wrapper").children().fadeOut(600, function(){
                    
                    $("#body-wrapper").append("<div class='form-wrapper'><img id='loading' src='inc/loading.gif' width='290'/></div>");
                    $("#body-wrapper #loading").fadeIn(900);
                    
                    setTimeout(function() {go_ajx("result")}, 3200);
            });

*/
            
        })
    }
    
    
    /*
     * result.php
    */
    function result_fn () {
        $("#result_btn").click(function() {
        
            go_ajx("check");
            
        })
    }
    
    
    
    
});


