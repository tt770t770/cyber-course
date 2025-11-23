<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $msg = $_POST['message'] ?? '';
}
?>
<!doctype html><html><body>
  <form method="post"><input name="message"><button>Send</button></form>
  <?php if ($msg !== ''): ?>
    <p>Your message: <?php echo $msg; ?></p> <!-- vulnerable -->
  <?php endif; ?>
</body></html>
