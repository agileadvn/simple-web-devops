<?php
require_once 'sentry-php-master/lib/Raven/Autoloader.php';
Raven_Autoloader::register();

$client = new Raven_Client('https://00872b23f74d4b958e8cf11ae1298493:e4444fe53ad34a0ca556b20215b616eb@sentry.io/931548');
$error_handler = new Raven_ErrorHandler($sentryClient);
$error_handler->registerExceptionHandler();
$error_handler->registerErrorHandler();
$error_handler->registerShutdownFunction();
?>
<html>
  <head>
    <title>Demo Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div>
      <h2>Choose to list all products</h2>
      <input type="button" id="mock" value="i-Mock products" />
      <input type="button" id="real" value="i-Real products" />
      <p />
      <div id="product-list">
      </idv>
    </div>
    <script>

    $(document).ready(function() {
      $("#mock").click(function(){
          updateProducts('mock');
      });
      $("#real").click(function(){
          updateProducts('real');
      });
    });

    function updateProducts(type) {
      $.ajax({
        url: "api/products.php?type=" + type,
        method: "GET",
        success: function(result) {
          html = '<table cellpadding=10 cellspacing=1 border=1>';
          html += '<tr><th>Id</th><th>Name</th><th>Description</th></tr>'
          $.each(JSON.parse(result), function(index, item) {
            html += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.description + '</td></tr>';
          });
          html += '</table>'
          $( "#product-list" ).html( "<strong>" + html + "</strong>" );
        }
      });
    }
    </script>
  </body>
</html>
<?php
$items = $productRepository->getAllMockProducts();
if (isset($_GET['type']) && ($_GET['type'] == 'real')) {
  $items = $productRepository->getAllProducts();
}
print_r($items);
?>
