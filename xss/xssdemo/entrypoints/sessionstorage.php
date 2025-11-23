<?php
// Simple page that reads sessionStorage via client JS and injects into innerHTML (vulnerable)
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>sessionStorage XSS Demo (VULN)</title></head>
<body>
  <h1>Welcome to sessionStorage XSS demo</h1>
  <p>Stored name will be shown below (UNSAFE):</p>
  <div id="display" style="border:1px solid #ccc;padding:12px;border-radius:6px;"></div>

  <script>
    // VULNERABLE client-side code: reading sessionStorage and putting it into innerHTML
    const name = sessionStorage.getItem('name') || 'Guest';
    document.getElementById('display').innerHTML =
      '<strong>Name:</strong> ' + name; // <-- vulnerable sink (innerHTML)
  </script>
</body>
</html>
