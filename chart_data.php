<?php
	include ('inc/php/dbconnect.php');

	// $search_date = $_POST['search_date'];
	// $keyword = $_POST['keyword'];

  $search_date = '20141226';
  $keyword = '백종원';

	$query = " SELECT  SEARCH_TIME
                 , RANK
               FROM  REAL_SEARCH_WORD
               WHERE SEARCH_DATE = '$search_date'
                  AND KEYWORD = '$keyword'";


    $result = $mysqli->query($query);


    $prefix = '';
	echo "[\n";

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    	echo $prefix . " {\n";
  		echo '  "x": "' . getTimeValue($row['SEARCH_TIME']) . '",' . "\n";
  		echo '  "y": "' . $row['RANK'] . '"' . "\n";
  		echo " }";
  		$prefix = ",\n";
    }
    echo "\n]";


  function getTimeValue($str) {

    $data = '';

    switch ($str) {
      case '0000':
        $data = 1;
        break;
      case '0010':
        $data = 2;
        break;
      case '0020':
        $data = 3;
        break;
      case '0030':
        $data = 4;
        break;
      case '0040':
        $data = 5;
        break;
      case '0050':
        $data = 6;
        break;
      case '0100':
        $data = 7;
        break;
      case '0110':
        $data = 8;
        break;
      case '0120':
        $data = 9;
        break;
      case '0130':
        $data = 10;
        break;
      case '0140':
        $data = 11;
        break;
      case '0150':
        $data = 12;
        break;
      case '0200':
        $data = 13;
        break;
      case '0210':
        $data = 14;
        break;
      case '0220':
        $data = 15;
        break;
      case '0230':
        $data = 16;
        break;
      case '0240':
        $data = 17;
        break;
      case '0250':
        $data = 18;
        break;
      case '0300':
        $data = 19;
        break;
      case '0310':
        $data = 20;
        break;
      case '0320':
        $data = 21;
        break;
      case '0330':
        $data = 22;
        break;
      case '0340':
        $data = 23;
        break;
      case '0350':
        $data = 24;
        break;
      case '0400':
        $data = 25;
        break;
      case '0410':
        $data = 26;
        break;
      case '0420':
        $data = 27;
        break;
      case '0430':
        $data = 28;
        break;
      case '0440':
        $data = 29;
        break;
      case '0450':
        $data = 30;
        break;
      case '0500':
        $data = 31;
        break;
      case '0510':
        $data = 32;
        break;
      case '0520':
        $data = 33;
        break;
      case '0530':
        $data = 34;
        break;
      case '0540':
        $data = 35;
        break;
      case '0550':
        $data = 36;
        break;
      case '0600':
        $data = 37;
        break;
      case '0610':
        $data = 38;
        break;
      case '0620':
        $data = 39;
        break;
      case '0630':
        $data = 40;
        break;
      case '0640':
        $data = 41;
        break;
      case '0650':
        $data = 42;
        break;
      case '0700':
        $data = 43;
        break;
      case '0710':
        $data = 44;
        break;
      case '0720':
        $data = 45;
        break;
      case '0730':
        $data = 46;
        break;
      case '0740':
        $data = 47;
        break;
      case '0750':
        $data = 48;
        break;
      case '0800':
        $data = 49;
        break;
      case '0810':
        $data = 50;
        break;
      case '0820':
        $data = 51;
        break;
      case '0830':
        $data = 52;
        break;
      case '0840':
        $data = 53;
        break;
      case '0850':
        $data = 54;
        break;
      case '0900':
        $data = 55;
        break;
      case '0910':
        $data = 56;
        break;
      case '0920':
        $data = 57;
        break;
      case '0930':
        $data = 58;
        break;
      case '0940':
        $data = 59;
        break;
      case '0950':
        $data = 60;
        break;
      case '1000':
        $data = 61;
        break;
      case '1010':
        $data = 62;
        break;
      case '1020':
        $data = 63;
        break;
      case '1030':
        $data = 64;
        break;
      case '1040':
        $data = 65;
        break;
      case '1050':
        $data = 66;
        break;
      case '1100':
        $data = 67;
        break;
      case '1110':
        $data = 68;
        break;
      case '1120':
        $data = 69;
        break;
      case '1130':
        $data = 70;
        break;
      case '1140':
        $data = 71;
        break;
      case '1150':
        $data = 72;
        break;
      case '1200':
        $data = 73;
        break;
      case '1210':
        $data = 74;
        break;
      case '1220':
        $data = 75;
        break;
      case '1230':
        $data = 76;
        break;
      case '1240':
        $data = 77;
        break;
      case '1250':
        $data = 78;
        break;
      case '1300':
        $data = 79;
        break;
      case '1310':
        $data = 80;
        break;
      case '1320':
        $data = 81;
        break;
      case '1330':
        $data = 82;
        break;
      case '1340':
        $data = 83;
        break;
      case '1350':
        $data = 84;
        break;
      case '1400':
        $data = 85;
        break;
      case '1410':
        $data = 86;
        break;
      case '1420':
        $data = 87;
        break;
      case '1430':
        $data = 88;
        break;
      case '1440':
        $data = 89;
        break;
      case '1450':
        $data = 90;
        break;
      case '1500':
        $data = 91;
        break;
      case '1510':
        $data = 92;
        break;
      case '1520':
        $data = 93;
        break;
      case '1530':
        $data = 94;
        break;
      case '1540':
        $data = 95;
        break;
      case '1550':
        $data = 96;
        break;
      case '1600':
        $data = 97;
        break;
      case '1610':
        $data = 98;
        break;
      case '1620':
        $data = 99;
        break;
      case '1630':
        $data = 100;
        break;
      case '1640':
        $data = 101;
        break;
      case '1650':
        $data = 102;
        break;
      case '1700':
        $data = 103;
        break;
      case '1710':
        $data = 104;
        break;
      case '1720':
        $data = 105;
        break;
      case '1730':
        $data = 106;
        break;
      case '1740':
        $data = 107;
        break;
      case '1750':
        $data = 108;
        break;
      case '1800':
        $data = 109;
        break;
      case '1810':
        $data = 110;
        break;
      case '1820':
        $data = 111;
        break;
      case '1830':
        $data = 112;
        break;
      case '1840':
        $data = 113;
        break;
      case '1850':
        $data = 114;
        break;
      case '1900':
        $data = 115;
        break;
      case '1910':
        $data = 116;
        break;
      case '1920':
        $data = 117;
        break;
      case '1930':
        $data = 118;
        break;
      case '1940':
        $data = 119;
        break;
      case '1950':
        $data = 120;
        break;
      case '2000':
        $data = 121;
        break;
      case '2010':
        $data = 122;
        break;
      case '2020':
        $data = 123;
        break;
      case '2030':
        $data = 124;
        break;
      case '2040':
        $data = 125;
        break;
      case '2050':
        $data = 126;
        break;
      case '2100':
        $data = 127;
        break;
      case '2110':
        $data = 128;
        break;
      case '2120':
        $data = 129;
        break;
      case '2130':
        $data = 130;
        break;
      case '2140':
        $data = 131;
        break;
      case '2150':
        $data = 132;
        break;
      case '2200':
        $data = 133;
        break;
      case '2210':
        $data = 134;
        break;
      case '2220':
        $data = 135;
        break;
      case '2230':
        $data = 136;
        break;
      case '2240':
        $data = 137;
        break;
      case '2250':
        $data = 138;
        break;
      case '2300':
        $data = 139;
        break;
      case '2310':
        $data = 140;
        break;
      case '2320':
        $data = 141;
        break;
      case '2330':
        $data = 142;
        break;
      case '2340':
        $data = 143;
        break;
      case '2350':
        $data = 144;
        break;

      default:
        $data = $str;
        break;
    }

    return $data;
  }
?>