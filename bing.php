<?php

//The XML string that you want to send.
$xml = '<SubmitUrlBatch xmlns="http://schemas.datacontract.org/2004/07/Microsoft.Bing.Webmaster.Api"> 
<siteUrl>http://kisk-9dogtraining.com</siteUrl> 
<urlList> 
<string xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">http://kisk-9dogtraining.com</string> 
</urlList> 
</SubmitUrlBatch>';


//The URL that you want to send your XML to.
//$url = 'http://localhost/xml';
$url = 'ssl.bing.com/webmaster/api.svc/pox/SubmitUrlBatch?apikey=6f701be0c7064f35930bbe20122bf5f3 HTTP/1.1';


//Initiate cURL
$curl = curl_init($url);

//Set the Content-Type to text/xml.
curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/xml; charset=utf-8"));

//Set CURLOPT_POST to true to send a POST request.
curl_setopt($curl, CURLOPT_POST, true);

//Attach the XML string to the body of our request.
curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);

//Tell cURL that we want the response to be returned as
//a string instead of being dumped to the output.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Execute the POST request and send our XML.
$result = curl_exec($curl);

//Do some basic error checking.
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}

//Close the cURL handle.
curl_close($curl);

//Print out the response output.
echo $result;
echo '<br/>new done';
?>