<?php

$mail = mail("defri@mcojaya.com", "test", "test dolo"); 

if(!$mail){
  echo "Gagal kirim email \r\n";
}else{
    echo "email terkirim \r\n";
}
?>
    