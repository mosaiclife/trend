<head>
        <meta charset="UTF-8">

        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <title>::: Trend :::</title>

        <script type="text/javascript">
          $(document).ready(function() {
            $("#draw").click(function() {
              //alert("aa");

              //var data = getDataRequest();
              //var data = getDataAjax();
              //$("body").append(data);


              var ctx = $('#cv').get(0).getContext('2d');

              //var json = getDataRequest();
              var json = getDataAjax();
              var data = $.parseJSON(json);

              var xsize = 4.7;
              var ysize = 7.5;
              // var data = [
              //     { x:   0, y:   0 },
              //     { x:  10, y:  50 },
              //     { x:  50, y: 150 },
              //     { x: 150, y: 250 },
              // ];


              function drawCircle(data, radius, xsize, ysize) {
                  ctx.beginPath();
                  ctx.arc(data.x * xsize, data.y * ysize, radius, 0, Math.PI * 2); // 0 - 2pi is a full circle
                  ctx.fill();
              }


              function drawLine(from, to, xsize, ysize) {
                  ctx.beginPath();
                  ctx.moveTo(from.x * xsize, from.y * ysize);
                  ctx.lineTo(to.x * xsize, to.y * ysize);
                  ctx.stroke();
              }

              var b_data = data[0];

              $.each(data, function() {
                drawCircle(this, 1.5, xsize, ysize);
                drawLine(b_data,this, xsize, ysize);
                b_data = this;
              });


            });


            $("#getdata").click(function() {
              //var data = getDataRequest();
              var data = getDataAjax();

              var list = $.parseJSON(data);

              $("body").append(data);
            });


            function getDataRequest() {
              var request = new XMLHttpRequest();

              request.open('GET', 'chart_data.php', false);
              request.send();

              return (request.responseText);
            }


            function getDataAjax() {
              var data = '';

              $.ajax({
                type: 'POST',
                url: 'chart_data.php',
                //data: { search_date : '20141226', keyword : '백종원' },
                success: function(result) {
                  //$("body").append(result);
                  data = result;
                }
              });

              return data;
            }




          });
        </script>
</head>
<body>

<button id="draw">Draw!</button>

<canvas width="300" height="100" id="cv" style="border: 1px solid red;"></canvas>

<button id="getdata">Get Data</button>

</body>