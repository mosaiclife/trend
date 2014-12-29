$(document).ready(function() {

    $(window).bind("pageshow", function(event) {
        if (event.originalEvent.persisted) {
            main_fn();
        }
    });

    
    
    class_fn("#nav_home", "current");
    

    // Header date click Event
    $("#date_left").click(function() {
        var date = $("#date").val();

        alert(addDate(date, -1));
    });
    
    

    /*
     * Ajax integration function
    */
    
    function go_ajx(page) {
        
        switch (page) {
            case "home" :
                ajax_fn("main","0");
                break;
            case "issue" :
                ajax_fn("view","1");
                break;
            case "news" :
                ajax_fn("view","2");
                break;
            case "ent" :
                ajax_fn("view","3");
                break;
            case "sport" :
                ajax_fn("view","4");
                break;
        }

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
        go_ajx("home");
    });
    
    $("#nav_issue").click(function() {
        go_ajx("issue");
    });
    
    $("#nav_news").click(function() {
        go_ajx("news");
    });

    $("#nav_ent").click(function() {
        go_ajx("ent");
    });

    $("#nav_sport").click(function() {
        go_ajx("sport");
    });
    
    
    
    /*
     * Ajax Function
    */
    function ajax_fn (name, search_se) {
        
        $.ajax({
            url: name + '.php',
            type: 'POST',
            data: { search_se : search_se },
            success: function(result) {
            	
                $("#body-wrapper").children().fadeOut(600, function(){
                    $("#body-wrapper").children().remove();
                    $("#body-wrapper").append(result).children().css("display", "none");
                    $("#body-wrapper").children().fadeIn(900);
                    
                    $("html, body").animate({ scrollTop: 0 }, "slow");

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
                alert("error");
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
    
    
    
    // check page Test용
    $("#beta_btn").click(function(){
	    
	    //alert('테스트');
        //$("#moms_year").attr("selected", "selected");
        $("#moms_year option:first").remove();
        $("#moms_month option:first").remove();
        $("#moms_day option:first").remove();
        
        $("#pregnant_year option:first").remove();
        $("#pregnant_month option:first").remove();
        $("#pregnant_day option:first").remove();
    })
    
    
    
});


