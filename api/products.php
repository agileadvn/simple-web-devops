<?php
require_once('../storage/ProductRepository.php');

$productRepository = new ProductRepository();
$items = $productRepository->getAllMockProducts();
if (isset($_GET['type']) && ($_GET['type'] == 'real')) {
  $items = $productRepository->getAllProducts();
}

sendResponse(200, json_encode($items));

function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
  $status_header = 'HTTP/1.1 ' . $status . ' OK';
  header($status_header);
  header('Content-type: ' . $content_type);
  echo $body;
}

?>
