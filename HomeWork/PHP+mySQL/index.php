<?php
require_once('mysqli_connect.php');

$title = "home";

$page = "index";
include('includes/header.html');
?>

<div class=”container”>
<div class="page-header"><h1>hello</h1></div>
<p>This is where the page-specific content goes. This section, and the corresponding header, will change from one page to the next.</p>
<?php
// Call the function again:
create_ad();

include('includes/footer.html');
?>


