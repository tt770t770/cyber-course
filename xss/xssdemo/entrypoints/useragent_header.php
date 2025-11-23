<html>
<body>
  <h1>Victim page</h1>
  <p>This page prints the User-Agent header (INTENTIONALLY VULNERABLE).</p>

  <div style="padding:12px;border:1px solid #ccc;">
    <strong>User-Agent:</strong>
    <?php
      // VULNERABLE: echoing user-agent without escaping for demo only
      echo $_SERVER['HTTP_USER_AGENT'];
    ?>
  </div>
  
</body>
</html>
