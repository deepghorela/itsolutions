<?php

function getLogoUrl(){
    return env('APP_URL')."/assets/images/new-logo.png";
}
function getLightLogoUrl(){
    return env('APP_URL')."/assets/images/black-logo-v1.png";
}

/**
 * Get Business Schema
 *
 * @param object $locationDetails
 * @param array|object $otherInfo
 * @return array
 */
function getBusinessSchema($locationDetails, $otherInfo=array())
{
    $toReturn  = array(
        "@type" => "Organization",
        "name" => env('APP_NAME'),
        "url" => env('APP_URL'),
        "brand" => [
            "@type" => "Brand",
            "name" => env('APP_NAME'),
            "logo" => getLogoUrl()
        ],
        "mainEntityOfPage" => getSchemaMainEntityOfPage($otherInfo),
        "address" => getAddressSchema($locationDetails),
        "@context" => "http://schema.org"
    );
    $socialMediaLinks = getSocialMediaSchema();
    if(!empty($socialMediaLinks)){
      $toReturn['sameAs'] = $socialMediaLinks;
    }
    return $toReturn;
}

function getSchemaMainEntityOfPage($otherInfo)
{
  if (!isset($otherInfo['slug'])) {
    return;
  }
  $toAppend = "";
  if ($otherInfo['slug'] != 'home') {
    $toAppend = "/" . $otherInfo['slug'];
  }
  return array(
    "@type" => "WebPage",
    "@id" => env('APP_URL') . $toAppend
  );
}


function getBreadCrumb($otherInfo){
    $toAppend = "/".$otherInfo['slug'];
    if($otherInfo['slug'] == 'home'){
        return;
    }
    return [
        "@type" => "BreadcrumbList",
        "itemListElement"=> [
          [
            "@type" => "ListItem",
            "position" => 1,
            "item"=> [
              "@id" =>  env('APP_URL'),
              "name" => "Home"
            ]
          ],
          [
            "@type" => "ListItem",
            "position" => 2,
            "item"=> [
              "@id" => env('APP_URL').$toAppend,
              "name" => $otherInfo['heading']
            ]
          ]
        ],
        "@context" => "http://schema.org"
      ];
}


function getSocialMediaSchema(){
  return array(
    'https://www.facebook.com/softechtechnology2014'
  );
}


function getAddressSchema($locationInfo)
{
  return array(
    "@type" => 'PostalAddress',
    'streetAddress' => $locationInfo->address_1,
    'addressLocality' => $locationInfo->address_2.", ".$locationInfo->city,
    'addressRegion' => $locationInfo->district.", ".$locationInfo->state,
    'postalCode' => $locationInfo->pincode,
    'telephone' => "+91".$locationInfo->contact_number,
    'email' => $locationInfo->contact_email,
    'addressCountry' => array(
      "@type" => 'Country',
      'name' => 'India'
    ),
  );
}

function getGeoLocations($locationData){
  return array(
    "@type"=> "GeoCoordinates",
    "latitude" => $locationData->latitude,
    "longitude" => $locationData->longitude,
  );
}

function getBusinessHoursSchema(){
  $days = array(
    "Monday", "Tuesday", "Wednesday", "Friday", "Saturday", "Sunday"
  );
  foreach($days as $day){
    $toReturn[] = array(
      "@type" => "OpeningHoursSpecification",
      "opens" => "10:00:00",
      "closes" => "18:00:00",
      "dayOfWeek" => "http://schema.org/".$day,
    );
  }
  return $toReturn;
}

function getLocalBusinessSchema($locationData){
  return array(
    "@type" => "LocalBusiness",
    "@context" => "http://schema.org",
    "name" => !in_array($locationData->title, array("Registered Office", "Regional Office", "Operating Office")) ? $locationData->title : env('APP_NAME'),
    "address" => getAddressSchema($locationData),
    "geo" => getGeoLocations($locationData),
    "openingHoursSpecification" => getBusinessHoursSchema(),
    "currenciesAccepted" => "INR",
    "paymentAccepted" => array("Cash", "Credit Card", "Debit Card", "PayTM", "PhonePe", "BHIM UPI", "GPay"),
    "priceRange" => "$",
    "aggregateRating" => getRatingSchema(),
    "contactPoint" => getContactPointSchema($locationData)
  );
}

function getContactPointSchema($locationData)
{
  return array(
    "@type" => "ContactPoint",
    "areaServed" => "IN",
    "availableLanguage" => getAvailableLanguageSchema(),
    "contactType" => array(
      "Customer Support", "Technical Support", "Billing Support", "Laptop Repair", "Sales"
    ),
    "name" => "Manager",
    "email" => $locationData->contact_email,
    "telephone" =>  "+91" . ($locationData->contact_number),
  );
}

function getComputerStoreSchema($locationData)
{
  return [
    "@context" => "https://schema.org",
    "@type" => "ComputerStore",
    "name" => !in_array($locationData->title, array("Registered Office", "Regional Office", "Operating Office")) ? $locationData->title : env('APP_NAME'),
    "url" => env('APP_URL'),
    "logo" => getLogoUrl(),
    "image" => getLogoUrl(),
    "description" => env('META_DESCRIPTION'),
    "address" => getAddressSchema($locationData),
    "geo" => getGeoLocations($locationData),
    "openingHoursSpecification" => getBusinessHoursSchema(),
    "contactPoint" => getContactPointSchema($locationData),
    "sameAs" => getSocialMediaSchema(),
    "keywords" => implode(", ", getSeoTags())
  ];
}


function getRatingSchema(){
  return array(
    "@type" => "AggregateRating",
    "@context" => "https://schema.org",
    "reviewCount" => 4,
    "ratingValue" => 5,
  );
}

function getAvailableLanguageSchema(){
  return array(
    array(
      "@type"=> "Language",
      "name"=> "English"
    ),
    array(
      "@type"=> "Language",
      "name"=> "Hindi"
    ),
  );
}
