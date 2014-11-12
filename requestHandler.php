<?php
/**
 * Created By: Nilesh Sadarangani <nileshsani@gmail.com>
 * Date: 12/11/14
 */
include_once('scrapeEcommerce.php');
$scrapeShop =  new scrapeEcommerce();
$searchString = isset($_POST['searchString']) ? trim($_POST['searchString']) : '';

$scrapeShop->setSearchUrl("http://www.amazon.com/s/field-keywords=[search-string]");
$scrapeShop->setSearchString($searchString);
$rawData = $scrapeShop->getRawData();

$report = $scrapeShop->generateReport($rawData);
