<?php
$session_id = session_id();
if (empty($session_id))
{
    session_start();
}
$configs = include "./config.php";

$client_id = $configs['client_id'];
$client_secret = $configs['client_secret'];

// echo $_SESSION['access_token'];


// echo "<br> string";

// echo $_SESSION['refresh_token'];

// echo "<br> string";

// echo $_SESSION['realmId'];

// die;

require "../../vendor/autoload.php";
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;
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
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
//Add a new Vendor
$theResourceObj = Customer::create([
    "BillAddr" => [
        "Line1" => "123 Main Street",
        "City" => "Mountain View",
        "Country" => "USA",
        "CountrySubDivisionCode" => "CA",
        "PostalCode" => "94042"
    ],
    "GivenName" => "James",
    "FamilyName" => "King",
    "CompanyName" => "King Groceries",
    "DisplayName" => "King's Groceries Displayname",
    "PrimaryPhone" => [
        "FreeFormNumber" => "(555) 555-5555"
    ],
    "PrimaryEmailAddr" => [
        "Address" => "jdrew@myemail.com"
    ]
]);
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