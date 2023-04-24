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
  echo "Connected successfully.<br>";


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



//функцыя завантаження категории з обраним виглядо ТОВАРИ
function silenium_request_sel_val_product($url) {
  $host = 'http://localhost:9515';
  $capabilities = DesiredCapabilities::chrome();
  $driver = RemoteWebDriver::create($host, $capabilities);
  $driver->get($url);
  $button = $driver->findElement(WebDriverBy::cssSelector('.primary'));
  $button->click();
  $cookie1 = new Cookie('CAT_BROWSING_TYPE', 'product');

  $driver->manage()->addCookie($cookie1);
  $driver->navigate()->refresh();
  $html = $driver->getPageSource();
  $driver->close();
  return $html;
}


// //створееня файлым з категориями з обраним виглядом ТОВАРИ
// $sql = "SELECT * FROM subcatalog";
// $result = $conn->query($sql);
// $page_cat = 1;
// while ($row = $result->fetch_assoc()){
// $sub_cat = ($row['href']);
// $html = silenium_request_sel_val_product($sub_cat);
// file_put_contents('/Users/albertas/lastcatalog/page_'.$page_cat.'.html', $html);
// $page_cat++;
// }

//рабочий
// $dir_files_cache_pages = '/Users/albertas/lastcatalog/';
// $files_in_directory = scandir($dir_files_cache_pages);
// foreach ($files_in_directory as $files) {
//   if ($files[0]!=='.' && $files[1]!=='.') {
// $doc = file_get_contents($dir_files_cache_pages.'/'.$files);
// // echo $doc;
// $document = \phpQuery::newDocument($doc);

// //отримааня посиляння на дану сторынку
// $link = $document->find('[rel="canonical"]');
// foreach($link as $key => $value){
//   $pq = pq($value);
//   $cur_link = $pq->attr("href");
//   $cur_link_full = urldecode($cur_link);

//  }
// //отрмання массиву пагынацыъ сторинок
// $pag_div = $document->find('.kh-zjik7')->eq(0); 
// if(count($pag_div)) {
// foreach($pag_div->find('.ui-button') as $key => $value){
//     $pq = pq($value);
//     $pag_a = $pq->text();
//     $pag_array[] = $pag_a;
// }
// $mod_pag_array = array_values(array_filter($pag_array, 'strlen'));
//  $last_element = end($mod_pag_array);
//  for ($i=$last_element; $i>=1; $i--)  {
// $pagination_page = $cur_link_full.'?page='.$i;
//  $sql = "INSERT INTO all_links (id, href)
// VALUES (NULL, '$pagination_page')";
// $conn->query($sql);
// }
// }
// else {
//   $sql = "INSERT INTO all_links (id, href)
// VALUES (NULL, '$cur_link_full')";
// $conn->query($sql);
// }
//   }
// }


//рабочий
// $sql = "SELECT * FROM all_links";
// $result = $conn->query($sql);
// $page_cat = 1;
// while ($row = $result->fetch_assoc()){
// $sub_cat = ($row['href']);
// $html = silenium_request_sel_val_product($sub_cat);
// file_put_contents('/Users/albertas/all_page/page_'.$page_cat.'.html', $html);
// $page_cat++;
// }


//gомищення в базу передоостаных категорий раб
$dir_files_cache_pages = '/Users/albertas/all_page/';
$files_in_directory = scandir($dir_files_cache_pages);
foreach ($files_in_directory as $files) {
  if ($files[0]!=='.' && $files[1]!=='.') {
    $doc = file_get_contents($dir_files_cache_pages.'/'.$files);
    $document = \phpQuery::newDocument($doc);
    foreach($document->find('.kh-1leo7fl') as $key => $value){
      $pq = pq($value);
     $href = $pq->find('a')->attr('href');
    
$product_link = urldecode($href);
$product_link = 'https://www.kramp.com'.$product_link;
$sql = "INSERT INTO all_products (id, href)
 VALUES (NULL, '$product_link')";
$conn->query($sql);
      }
    }
  }






  function silenium_request_with_auth($url) {
    $host = 'http://localhost:9515';
    $capabilities = DesiredCapabilities::chrome();
    $driver = RemoteWebDriver::create($host, $capabilities);
    $driver->get($url);
    $button = $driver->findElement(WebDriverBy::cssSelector('.primary'));
    $button->click();
    $enter_log = $driver->findElement(WebDriverBy::xpath('//*[@id="__next"]/header/div[1]/div/div/div[3]/div/div[3]/div/a/span'));

$enter_log->click();
$login = $driver->findElement(WebDriverBy::name('username'));
$login->sendKeys('strumentua@gmail.com');
$password = $driver->findElement(WebDriverBy::name('password'));
$password->sendKeys('strument1')->submit();
    $html = $driver->getPageSource();
    $driver->close();
    return $html;
    }  


$sql = "SELECT * FROM all_products";
$result = $conn->query($sql);
$page_cat = 1;
while ($row = $result->fetch_assoc()){
$sub_cat = ($row['href']);
$html = silenium_request_with_auth($sub_cat);
file_put_contents('/Users/albertas/all_products/page_'.$page_cat.'.html', $html);
$page_cat++;
}


















