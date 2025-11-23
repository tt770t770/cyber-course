<html>
<body>
  <h1>Victim page</h1>
  <p>This page prints the Referer header (INTENTIONALLY VULNERABLE).</p>

  <div style="padding:12px;border:1px solid #ccc;">
    <strong>Referer Header:</strong>
    <?php
      // VULNERABLE: echoing user-agent without escaping for demo only
      echo rawurldecode($_SERVER['HTTP_REFERER']);
    ?>
  </div>
  
</body>
</html>

