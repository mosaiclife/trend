<?php
  //print '<iframe id="embeded-content" src="http://m.search.daum.net/search?q='.$_POST["KEYWORD"].'" width="300" style="border: none; width:300px; overflow:hidden;" />';
  //print '<iframe src="http://m.daum.net" width="300" />';
  //print '<iframe src="https://m.search.naver.com/search.naver?query='.$_POST["KEYWORD"].'" width="300" />';

//http://m.search.daum.net/search?q=
//https://m.search.naver.com/search.naver?query=
?>


<?php
$url = 'http://www.google.com/search?hl=en&q=';
$postVariable = 'string';
 
if (isset($_POST['string'])) {
    $output = file_get_contents($url . urlencode($_POST[$postVariable]));    
    $output = preg_replace('#<script.*</script>#ismU', '', $output);
    $output = preg_replace('#<style.*</style>#ismU', '', $output);    
    echo $output;
}
  ?>