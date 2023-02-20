<?php
//latihan loop
    for($no=1;$no<=20;$no++){
        if($no % 2 == 0){
            echo "$no = ";echo "<font style='color:red;'>Kalau yang ini bilangan genap</font><br>";
        }
        else{
            echo "$no = ";echo "<font style='color:blue;'>Ini bilangan ganjil</font><br>";
        }
    }
?>