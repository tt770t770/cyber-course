<?php
// search.php (vulnerable demo)
$q = $_GET['q'] ?? '';
?>
<html>
  <body>
    <h1>Search</h1>

    <form method="get" action="">
      <input type="text" name="q" value="<?php echo $q; ?>" placeholder="Search...">
      <button type="submit">Search</button>
    </form>

    <p>Results for: <?php echo $q; ?></p>
  </body>
</html>
