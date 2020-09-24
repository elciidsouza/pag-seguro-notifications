<?php
    $email = 'YOUR-EMAIL';
    $token = 'YOUR-TOKEN'; // you can get this token in your pagseguro dashboard

    if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    $url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/'.$_POST['notificationCode'].'?email=' . $email . '&token=' . $token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transactionCurl= curl_exec($curl);
    curl_close($curl);
    
    $transaction=  simplexml_load_string($transactionCurl);
    var_dump($transaction); // you can remove this after see the response
    }
    
    // here you can create your logics using the "$transaction" variable(or another if you change)
    
?>