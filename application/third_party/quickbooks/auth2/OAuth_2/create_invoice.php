<?php
$session_id = session_id();
if (empty($session_id))
{
    session_start();
}
require("./Client.php");

$configs = include "./config.php";

$tokenEndPointUrl = $configs['tokenEndPointUrl'];
$mainPage = $configs['mainPage'];
$client_id = $configs['client_id'];
$client_secret = $configs['client_secret'];


$grant_type= 'refresh_token';
//$certFilePath = './Certificate/all.platform.intuit.com.pem';
$certFilePath = './Certificate/cacert.pem';


$refresh_token = $_SESSION['refresh_token'];

$client = new Client($client_id, $client_secret, $certFilePath);

$result = $client->refreshAccessToken($tokenEndPointUrl, $grant_type, $refresh_token);
$_SESSION['access_token'] = $result['access_token'];
$_SESSION['refresh_token'] = $result['refresh_token'];

require "../../vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
//use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\Employee;
// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => $client_id,
    'ClientSecret' => $client_secret,
    'accessTokenKey' =>$_SESSION['access_token'],
    'refreshTokenKey' => $_SESSION['refresh_token'],
    'QBORealmID' => $_SESSION['realmId'],
    'baseUrl' => "Development"
));
//$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
//$dataService->throwExceptionOnError(true);



$theResourceObj = Employee::create([
    "PrimaryAddr" => [
      "Line1"=> "45 N. Elm Street",
      "City"=> "Middlefield",
      "CountrySubDivisionCode"=> "CA",
      "PostalCode"=> "93242"
    ],
    "GivenName"=> "Bill",
    "FamilyName"=>  "Miller",
    "DisplayName"=>  "Bill Miller",
    "PrimaryPhone": {
      "FreeFormNumber": "234-525-1234"
    },
    "PrimaryEmailAddr" => [
                "Address" => $data['advertiser_email']
            ]


]);
//Add a new Invoice
// $theResourceObj = Invoice::create([
//     "Line" => [
//     [
//          "Amount" => 100.00,
//          "DetailType" => "SalesItemLineDetail",
//          "SalesItemLineDetail" => [
//            "ItemRef" => [
//              "value" => 1,
//              "name" => "Services"
//            ]
//          ]
//     ],
//      [
//          "Amount" => 400.00,
//          "DetailType" => "SalesItemLineDetail",
//          "Description" => "alo",
//          "SalesItemLineDetail" => [
//            "ItemRef" => [
//              "value" => 2,
//              "name" => "Services 2"
//            ],
//            "UnitPrice" => 200.00,
//                 "Qty" => 2,
//          ]
//     ]
//     ],
//     "CustomerRef"=> [
//           "value"=> 4
//     ],
//         "EmailStatus" => "EmailSent",
//         "PrintStatus" => "NeedToPrint",
//     "BillEmail" => [
//           "Address" => "haadi.javaid@gmail.com"
//     ],
// ]);

$resultingObj = $dataService->Add($theResourceObj);

$error = $dataService->getLastError();

if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
