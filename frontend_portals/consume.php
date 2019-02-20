<?php 
session_start();
if($_POST["gigId"] != NULL)
{



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Contract");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{  
	"$class": "org.solar.ex.Contract",   
	"contractId": "'.$_POST["contractId"].'",
	"energy": '.$_POST["energy"].',
	"price": '.$_POST["price"].',
	"contractState": "SELLER_ACCEPTED",
	"buyer": "resource:org.solar.ex.Buyer#'.$_SESSION["email"].'",
	"seller": "resource:org.solar.ex.Seller#'.$_POST["seller"].'"   }');
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);


$res = json_decode($result, true);
//var_dump($res);
$res[0]["contractId"];
//}


//echo $res["uId"];

if($res["contractId"] != NULL){
      

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.ConsumeContract");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{     
	"$class": "org.solar.ex.ConsumeContract",
    "contract": "resource:org.solar.ex.Contract#'.$_POST["contractId"].'" ,
    "buyer": "resource:org.solar.ex.Buyer#'.$_SESSION["email"].'"   }');
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);


$res = json_decode($result, true);

$res[0]["$class"];
//}

//var_dump($res);
//echo $res["uId"];

if($res["transactionId"] != NULL){
      
       echo $res["transactionId"];
}


else 
{
   echo "0";
    
}
}


else 
{
   echo "0";
    
}

}
else 
{
   echo "0";
    
}
 ?>