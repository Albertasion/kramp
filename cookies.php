<?php
namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverSelect;

ini_set('max_execution_time', 0);
require_once('vendor/autoload.php');
function format ($expre) {
  echo "<pre>";
  print_r($expre);
  echo "</pre>";
}
$servername = "localhost";
  $username = "user"; 
  $password = "user";
  $dbname = "kramp";
  $conn = new \mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";


  function request ($url) {
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // получение кода состояния HTTP
  return $output;
  }



function silenium_request($url) {
$host = 'http://localhost:9515';
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
$button = $driver->findElement(WebDriverBy::cssSelector('.primary'));
$button->click();
$html = $driver->getPageSource();
$driver->close();
return $html;
}




// $button = $driver->findElement(WebDriverBy::cssSelector('.primary'));
// $button->click();

// $enter_log = $driver->findElement(WebDriverBy::xpath('//*[@id="__next"]/header/div[1]/div/div/div[3]/div/div[3]/div/a/span'));

// $enter_log->click();
// $login = $driver->findElement(WebDriverBy::name('username'));
// $login->sendKeys('strumentua@gmail.com');
// $password = $driver->findElement(WebDriverBy::name('password'));
// $password->sendKeys('strument1')->submit();
// sleep(3);
// $firstmenuglobal = $driver->findElement(WebDriverBy::xpath('/html/body/div[2]/header/div[2]/div/div/div[1]/div/nav/a[1]'));
// $firstmenuglobal->click();
// $html = $driver->getPageSource();
// file_put_contents('/Users/albertas/pages_kramp/page.html', $html);


require 'phpquery.php';

//взяття з файлу основних категорий ы додавання их в базу
// $html = file_get_contents('/Users/albertas/pages_kramp/page.html');
// $document = phpQuery::newDocument($html);
// foreach($document->find('.kh-1fj56fq') as $key => $value){
//   $pq = pq($value);
//   $catalog_link[$key]["text_link"] = $pq->find('.kh-zx8yni h2')->text();
//   $catalog_link[$key]["href_link"] = 'https://www.kramp.com'. urldecode($pq->find('.kh-zx8yni')->attr('href'));
// }
// foreach ($catalog_link as $key => $value) {
//   $text_link = $value['text_link'];
//   $href_link = $value['href_link'];
// $sql = "INSERT INTO links (id, link, name)
// VALUES (NULL, '$href_link', '$text_link')";
// $conn->query($sql);
// }



//взяття основних категорий з бази и отримання файлыв категорий
// $sql = "SELECT * FROM links";
// $result = $conn->query($sql);
// $page_cat = 1;
// while ($row = $result->fetch_assoc()){
// $main_cat = ($row['link']);
// $html = silenium_request($main_cat);
// file_put_contents('/Users/albertas/catalog_kramp/page_'.$page_cat.'.html', $html);
// $page_cat++;
// }


//зчитуфання з файлыв головних категорый ы дубування 2 рывня ы занос в базу
// $dir_files_cache_pages = '/Users/albertas/catalog_kramp/';
// $files_in_directory = scandir($dir_files_cache_pages);
// foreach ($files_in_directory as $files) {
//   if ($files[0]!=='.' && $files[1]!=='.') {
//     $doc = file_get_contents($dir_files_cache_pages.'/'.$files);
//     $document = \phpQuery::newDocument($doc);
//     foreach($document->find('.kh-14p9xea') as $key => $value){
//       $pq = pq($value);
//       $catalog_link = $pq->find('a');
//       // $catalog_link = $catalog_link->attr('href');
//       $catalog_link =  'https://www.kramp.com'. urldecode($catalog_link->attr('href'));
//       $sql = "INSERT INTO catalog (id, href)
//  VALUES (NULL, '$catalog_link')";
// $conn->query($sql);
//       }
//     }
//   }

//выборка категорийи создание страниц файлы
// $sql = "SELECT * FROM catalog";
// $result = $conn->query($sql);
// $page_cat = 1;
// while ($row = $result->fetch_assoc()){
// $sub_cat = ($row['href']);
// $html = silenium_request($sub_cat);
// file_put_contents('/Users/albertas/subcatalog/page_'.$page_cat.'.html', $html);
// $page_cat++;
// }



//gомищення в базу передоостаных категорий
// $dir_files_cache_pages = '/Users/albertas/subcatalog/';
// $files_in_directory = scandir($dir_files_cache_pages);
// foreach ($files_in_directory as $files) {
//   if ($files[0]!=='.' && $files[1]!=='.') {
//     $doc = file_get_contents($dir_files_cache_pages.'/'.$files);
//     $document = \phpQuery::newDocument($doc);
//     foreach($document->find('.ui-column-lg-8') as $key => $value){
//       $pq = pq($value);
     
//       $catalog_link = $pq->find('a.kh-w3piuq');
   
// $catalog_link = urldecode($catalog_link->attr('href'));
// if (empty($catalog_link)) continue;
// $catalog_link = 'https://www.kramp.com'.$catalog_link;
// echo $catalog_link.'<br>';
//       $sql = "INSERT INTO subcatalog (id, href)
//  VALUES (NULL, '$catalog_link')";
// $conn->query($sql);
//       }
//     }
//   }


function silenium_request_products($url) {
  $host = 'http://localhost:9515';
  $capabilities = DesiredCapabilities::chrome();
  $driver = RemoteWebDriver::create($host, $capabilities);
  $driver->get($url);
  $cookie = array(
 'AnalyticsSyncHistory'=>'AQKwwIkAc1fITQAAAYebQo6OIIi8QfuHfIgdotyOkUh87AgomQeFSNu9mPU6TxB8Wy31BO49YoFgdijscakPUQ',
 'UserMatchHistory' => 'AQKC_uq62P10RgAAAYebQo6OAUuqEbhep8juMB1TlhAWiUFl6_fExK5ZDJQdkRXkxgpWumcQFlbpNA',
 'lidc' =>'"b=VGST01:s=V:r=V:a=V:p=V:g=2898:u=1:x=1:i=1681937042:t=1682023442:v=2:sig=AQHCeUuGTrNZC8K3-RzzO8l98pOW9MUU"',
 'bcookie'=>'"v=2&6750e2a0-cc34-4b55-830e-71821460c335"',
 'IDE'=>'AHWqTUlT41cUKMFFRc5ciZmZ8shD5f91K41DQykZemjf9CxKmEbqGZeQ4ItN636X',
 'CAT_BROWSING_TYPE'=>'product',
 'ln_or'=>'eyIxMjIzMTkzIjoiZCJ9',
 'GDPR_COOKIES_ACCEPT'=>'STANDARD',
 'CAT_DISPLAY_MODE'=>'grid',
 '_gid'=>'GA1.2.1006512913.1681937179',
 '_fbp'=>'fb.1.1681937185529.1953447308',
 'features'=>'%7B%22ua%22%3A%7B%22ProductImageViewer%22%3A%22false%22%2C%22ReducedSearchResults%22%3A%22false%22%2C%22UIBlueLinks%22%3A%22variant1%22%2C%22SynonymScoreEnabler%22%3A%22true%22%2C%22StockInfo%22%3A%22true%22%2C%22InteractedSearchTermCalculationKeyEnabler%22%3A%22true%22%2C%22NewProductTable%22%3A%22false%22%2C%22SynonymScore%22%3A%22control%22%2C%22BuyAtMaykers%22%3A%22false%22%2C%22SearchInteractedSearchTerms%22%3A%22true%22%2C%22MakeModelSearch%22%3A%22control%22%2C%22UIBackgroundElements%22%3A%22false%22%2C%22ProductGroupNavigation%22%3A%22true%22%2C%22OrderSubmitTimeExperimentWeb%22%3A%22false%22%2C%22InteractedSearchTermSearchSuccessIdentifiers%22%3A%22interaction_365d_language_atc%22%2C%22InteractedSearchNoBoundaries%22%3A%22interaction_365d_language_success%22%2C%22UIBlueLinksEnabler%22%3A%22false%22%2C%22FacetsSubmitButton%22%3A%22false%22%2C%22CollapseFacets%22%3A%22false%22%2C%22SupplementalItems%22%3A%22none%22%2C%22SearchOnSalesCategoryNameEnabler%22%3A%22true%22%2C%22InteractedSearchTermSearchSuccessIdentifiersEnabler%22%3A%22true%22%2C%22ProductGroupNavigationEnabler%22%3A%22false%22%2C%22ShowMyAccount%22%3A%22false%22%2C%22DeliveryOption%22%3A%22false%22%2C%22FreightCharges%22%3A%22false%22%2C%22OrderSubmitTimeExperimentApp%22%3A%22control%22%2C%22OrderSubmitTimeExperimentAppEnabler%22%3A%22false%22%2C%22InteractedSearchNoBoundariesEnabler%22%3A%22true%22%2C%22UIRedPrimaryButton%22%3A%22false%22%2C%22Chat%22%3A%22false%22%2C%22HideWishlist%22%3A%22false%22%2C%22DeliveryOptionSpecificDeliveryTime%22%3A%22false%22%2C%22PoweredByKramp%22%3A%22false%22%2C%22MakeModelSearchEnabler%22%3A%22false%22%2C%22UINewFontIconSuiteEnabler%22%3A%22true%22%2C%22UIBackgroundElementsEnabler%22%3A%22false%22%2C%22UINewHeaderFooterEnabler%22%3A%22false%22%2C%22SearchInteractedSearchTermsEnabler%22%3A%22false%22%2C%22RecipientName%22%3A%22false%22%2C%22ShoppingCartRecommendations%22%3A%22false%22%2C%22UIRoundedCornerSecondaryButtonsEnabler%22%3A%22true%22%2C%22Surcharges%22%3A%22false%22%2C%22UIRoundedCornerSecondaryButtons%22%3A%22false%22%2C%22InteractedSearchTermCalculationKey%22%3A%22interaction_365d_language%22%2C%22UINewHeaderFooter%22%3A%22true%22%2C%22ProductImageViewerEnabler%22%3A%22false%22%2C%22RelatedProductsRedesign%22%3A%22false%22%2C%22GuidedSearchPoc%22%3A%22false%22%2C%22AvailabilityV2%22%3A%22false%22%2C%22UINewFontIconSuite%22%3A%22control%22%2C%22SearchOnSalesCategoryName%22%3A%22control%22%7D%7D',
 'USER_LOCALE'=>'uk_UA',
 'SessionCheck'=>'1',
 'clientInstanceId'=>'clientInstanceId',
 'isLoggedIn'=>'false',
 '_ga'=>'GA1.2.648836000.1681937179',
 'fs_uid'=>'#o-1DK1YC-na1#6115923704139776:4905283052359680:::#/1713473185',
 '_ga_HCT789Y72W'=>'GS1.1.1681937039.1.1.1681937185.0.0.0',
 'li_sugr'=>'43f90cc1-f2ab-49ff-bb3f-82e4b2ae0b81',
 '_vis_opt_exp_0_fired'=>'1'
);
$driver->manage()->addCookie($cookie);

  $button = $driver->findElement(WebDriverBy::cssSelector('.primary'));
  $button->click();
  // $enter_log = $driver->findElement(WebDriverBy::xpath('//*[@id="__next"]/header/div[1]/div/div/div[3]/div/div[3]/div/a'));

// $enter_log->click();
// $login = $driver->findElement(WebDriverBy::name('username'));
// $login->sendKeys('strumentua@gmail.com');
// $password = $driver->findElement(WebDriverBy::name('password'));
// $password->sendKeys('strument1')->submit();
// sleep(3);

  // $select_element = $driver->findElement(WebDriverBy::className('kh-129n2lj'));
  // $select_element->click();
  // $select_down = $driver->findElement(WebDriverBy::cssSelector('.ui-select__select'));
  // $select_down ->sendKeys("\ue015");
  // $select_element->click();
  // $select = new WebDriverSelect($select_element);
  // $select->selectByIndex(1);
  //$menuOption = $driver->findElement(WebDriverBy::cssSelector('#__next > div > div.ui-row.ui-row--stretch > div.kh-5ezzic.ui-column-lg-20.ui-column-md-18 > div:nth-child(3) > div > div.ui-breakpoint-from-md.kh-b6qtg9 > div > div > div > div.kh-oe3dsw > div > span > div > select > option:nth-child(2) s'));
// $menuOption->click();

  $html = $driver->getPageSource();
  $driver->close();
  return $html;
  }


//робочий
$sql = "SELECT * FROM subcatalog";
$result = $conn->query($sql);
$page_cat = 1;
while ($row = $result->fetch_assoc()){
$sub_cat = ($row['href']);
$html = silenium_request_products($sub_cat);
file_put_contents('/Users/albertas/lastcatalog/page_'.$page_cat.'.html', $html);
$page_cat++;
break;
}


// $dir_files_cache_pages = '/Users/albertas/lastcatalog/';
// $files_in_directory = scandir($dir_files_cache_pages);
// foreach ($files_in_directory as $files) {
//   if ($files[0]!=='.' && $files[1]!=='.') {
//     $doc = file_get_contents($dir_files_cache_pages.'/'.$files);
//     $document = \phpQuery::newDocument($doc);
//     foreach($document->find('.ui-column-lg-8') as $key => $value){
//     $pq = pq($value);
   
//     $catalog_link = $pq->find('a.kh-w3piuq');
//     $catalog_link = urldecode($catalog_link->attr('href'));
//     if (empty($catalog_link)) continue;
//     $catalog_link = 'https://www.kramp.com'.$catalog_link;
//     echo $catalog_link.'<br>';
//     }
//   }   
//  }





































// $product_table = pq('.kh-sz4e9')->find('a');
// foreach ($product_table as $product) {
// $pq = pq($product)->attr('href');
// echo urldecode($pq).'<br>';
// }










// $text_all = [];
// $links_all = [];
// $links = $document->find('.kh-w3piuq');
// $text = $document->find('span.kh-m2feck');
// foreach ($links as $key => $link) {
//    $pqlink = pq($link)->attr('href');
//    $pqlink = urldecode($pqlink);

//    $full_links = 'https://www.kramp.com'. $pqlink.'<br>';
//    $sql = "INSERT INTO links (id, link, name)
// VALUES (NULL, '$full_links', 'name')";
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
  
//    $links_all[$key]['link'] = $full_links;
   
//    foreach ($text as $key => $tex) {
//       $pqtext = pq($tex)->text();
//       $links_all[$key]['text'] = $pqtext;
      
//    }
// }
// format($links_all);







// $input = $driver->findElement(WebDriverBy::tagName('input'));


// $input->sendKeys("AL-KO")->submit();
// $driver->executeScript('window.scrollTo(0, document.body.scrollHeight);');






// $array_str = [];
// $filename = '/Users/albertas/lbrake_links.txt';
// $lines = file($filename, FILE_IGNORE_NEW_LINES);
// foreach ($lines as $line) {
//   $str = "'".$line."'";
//   $array_str[] = $str; 
// }
// $string = implode(", ", $array_str);
// $string = strtoupper($string);
// echo $string;
//
