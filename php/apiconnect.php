<?php
    session_start();
?>
<?php

$number = $_REQUEST["number"];
$species = $_REQUEST["species"];
$size = $_REQUEST["sizePotential"];
$radius = $_REQUEST["radius"];
$breed = $_REQUEST["breed"];
$zipcode = $_REQUEST["zipcode"];
$zip_code = $_REQUEST["zip_code"];
$from_viewer = $_REQUEST["from_viewer"];

//Pet Search
$httpApiUrl = "https://api.rescuegroups.org/http/v2.json";

$data = array(
"apikey" => "",
"objectType" => "animals",
"objectAction" => "publicSearch",
"search" => array (
    "calcFoundRows" => "Yes",
    "resultStart" => $number,
    "resultLimit" => 20,
    "resultSort" => "animalID",
    "fields" => array("animalID","animalOrgID","animalName","animalSpecies","animalBreed","animalThumbnailUrl"),
    "filters" => array (
        array(
            "fieldName" => "animalStatus",
            "operation" => "equals",
            "criteria" => "Available"
            )
        )
    )
);

if($zip_code){
    array_push($data["search"]["filters"], array(
                "fieldName"=> "animalLocation",
                "operation"=> "equals",
                "criteria"=> $zip_code
            )
        );
}

if($species){
    array_push($data["search"]["filters"],  array(
                "fieldName" => "animalSpecies",
                "operation" => "equals",
                "criteria" => $species
            )
        );
}

if($size){
    array_push($data["search"]["filters"],  array(
                "fieldName" => "animalGeneralSizePotential",
                "operation" => "equals",
                "criteria" => $size
            )
        );
}

if($radius){
    array_push($data["search"]["filters"], array(
                "fieldName"=> "animalLocationDistance",
                "operation"=> "radius",
                "criteria"=> $radius
            )
        );
    array_push($data["search"]["filters"], array(
                "fieldName"=> "animalLocation",
                "operation"=> "equals",
                "criteria"=> $zipcode
            )
        );
}

if($breed){
    array_push($data["search"]["filters"],  array(
                "fieldName" => "animalBreed",
                "operation" => "equals",
                "criteria" => $breed
            )
        );
}

//echo $zip_code;

$result = postToApi($data);
if (!$result) {
    echo "login issue with the API.";
    exit;
}
header('Content-type: application/json');

if($from_viewer){
    $from_viewer = "true";
}else{
    $from_viewer = "false";
}

if($zip_code && ($from_viewer=="false")){
    //echo "Here";
    $_SESSION['data'] = (json_encode($result));
    $_SESSION['zip_code'] = $zip_code;
    header("Location: /workspace/viewer.html.php");
}else{
    //echo "Else";
    $_SESSION['data'] = 0;
    $_SESSION['zip_code'] = 0;
}
print(json_encode($result));
exit;

/*
//Petsearch with radius search
$httpApiUrl = "https://api.rescuegroups.org/http/v2.json";
$data = array(
    "apikey" => "",
    "objectType" => "animals",
    "objectAction" => "publicSearch",
    "search" => array (
        "calcFoundRows" => "Yes",
        "resultStart" => 0,
        "resultLimit" => 20,
        "resultSort" => "animalID",
        "fields" => array("animalID","animalOrgID","animalName","animalSpecies","animalBreed","animalThumbnailUrl","animalLocation"),
        "filters" => array (
            array(
                "fieldName" => "animalStatus",
                "operation" => "equals",
                "criteria" => "Available"
            ),
            array(
                "fieldName"=> "animalLocationDistance",
                "operation"=> "radius",
                "criteria"=> "50"
            ),
            array(
                "fieldName"=> "animalLocation",
                "operation"=> "equals",
                "criteria"=> "08807"
            )
        )
    )
);
$result = postToApi($data);
if (!$result) {
    echo "login issue with the API.";
    exit;
}
print_r($result);
exit;


//Org Search
$httpApiUrl = "https://api.rescuegroups.org/http/v2.json";
$data = array(
    "apikey" => "",
    "objectType" => "orgs",
    "objectAction" => "publicSearch",
    "search" => array (
        "resultStart"=> "0",
        "resultLimit"=> "100",
        "resultSort"=> "orgID",
        "resultOrder"=> "asc",
        "fields" => array("orgID","orgLocation","orgName","orgAddress","orgCity","orgState","orgPostalcode","orgPlus4","orgCountry","orgPhone","orgFax","orgEmail","orgWebsiteUrl","orgFacebookUrl","orgAdoptionUrl","orgDonationUrl","orgSponsorshipUrl","orgServeAreas","orgAdoptionProcess","orgAbout","orgServices","orgMeetPets","orgType","orgLocationDistance","orgCommonapplicationAccept"),
        "filters" => array (
            array(
                "fieldName" => "orgID",
                "operation" => "greaterthan",
                "criteria" => "0"
            )
        ),
        "filterProcessing"=> "1",
        
    )
);
$result = postToApi($data);
if (!$result) {
    echo "login issue with the API.";
    exit;
}
print_r($result);
exit;
 
*/


 
function postJson($url, $json) {
    // create a new cURL resource
    $ch = curl_init();
    // set options, url, etc.
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // grab URL and pass it to the browser
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        // TODO: Handle errors here
        return array(
                "result" => "",
                "status" => "error",
                "error" => curl_error($ch)
        );
    } else {
        // close cURL resource, and free up system resources
        curl_close($ch);
    }
    return array(
            "status" => "ok",
            "error" => "",
            "result" => $result,
    );
}
function postToApi($data) {
    $resultJson = postJson($GLOBALS["httpApiUrl"], json_encode($data));
    if ($resultJson["status"] == "ok") {
        $result = json_decode($resultJson["result"], true);
        $jsonError = getJsonError();
        if (!$jsonError && $resultJson["status"] == "ok") {
            return $result;
        } else {
            return array (
                    "status" => "error",
                    "text" => $result["error"] . $jsonError,
                    "errors" => array()
            );
        }
    } else return false;
}
function getJsonError() {
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            return false;
            break;
        case JSON_ERROR_DEPTH:
            return "Maximum stack depth exceeded";
            break;
        case JSON_ERROR_STATE_MISMATCH:
            return "Underflow or the modes mismatch";
            break;
        case JSON_ERROR_CTRL_CHAR:
            return "Unexpected control character found";
            break;
        case JSON_ERROR_SYNTAX:
            return "Syntax error, malformed JSON";
            break;
        case JSON_ERROR_UTF8:
            return "Malformed UTF-8 characters, possibly incorrectly encoded";
            break;
        default:
            return "Unknown error";
            break;
    }
}
?>