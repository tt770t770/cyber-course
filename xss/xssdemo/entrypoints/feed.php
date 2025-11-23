<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Victim Demo (PHP fetch)</title>
<style>
body{font-family:system-ui,Segoe UI,Roboto,Helvetica,Arial;margin:18px;color:#111}
.item{margin:10px 0;padding:8px;background:#f7f7f8;border-radius:6px}
.vuln{border:2px dashed #d9534f;padding:12px;border-radius:8px;margin-bottom:18px}
.safe{border:2px solid #5cb85c;padding:12px;border-radius:8px}
</style>
</head>
<body>
<h1>Third-party Feed — PHP Fetch Version</h1>

<?php
// URL of your local feed (can be localhost:8001 or remote)
$feedUrl = 'http://localhost:8001/feed.json';

// Fetch feed server-side (use curl for better control)
$ch = curl_init($feedUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT => 10,
]);
$json = curl_exec($ch);
if ($json === false) {
    echo "<p style='color:red'>Error fetching feed: " . htmlspecialchars(curl_error($ch)) . "</p>";
}
curl_close($ch);

// Decode JSON
$data = json_decode($json, true);
if (!$data) {
    echo "<p style='color:red'>Invalid JSON or empty feed.</p>";
    exit;
}
$items = $data['items'] ?? [];
?>

<div class="vuln">
  <h2>Vulnerable rendering (raw HTML output)</h2>
  <?php foreach ($items as $it): ?>
    <div class="item">
      <h3><?= $it['title'] ?? '' ?></h3>
      <p><?= $it['summary'] ?? '' ?></p>
      <!-- ❌ VULNERABLE: echoing attacker-controlled HTML directly -->
      <div><?= $it['content_html'] ?? '' ?></div>
      <a href="<?= htmlspecialchars($it['url'] ?? '') ?>">link</a>
    </div>
  <?php endforeach; ?>
</div>

</body>
</html>
