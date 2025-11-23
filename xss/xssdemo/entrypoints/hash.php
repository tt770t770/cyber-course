<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vulnerable Customer Profile SPA</title>
  <style>
    body { font-family: sans-serif; max-width: 800px; margin: 24px; }
    nav a { margin-right: 12px; }
    .tabs { margin-top: 16px; }
    .card { border: 1px solid #ddd; padding: 12px; border-radius: 6px; margin-top: 8px; }
  </style>
</head>
<body>
  <h1>Customer Profile (VULNERABLE DEMO)</h1>

  <nav>
    <!-- base navigation -->
    <a href="#basic">Basic Info</a>
    <a href="#history">Service History</a>
    <a href="#bills">Bills</a>
  </nav>

  <div id="content" class="tabs"></div>

  <script>
    // Minimal hash router for profile that reflects values directly into innerHTML (vulnerable)
    function route() {
      const page = decodeURIComponent(location.hash.slice(1)); // remove '#'
      const out = document.getElementById('content');

      // Clear existing content
      out.innerHTML = '';

      if (page === 'basic') {
        out.innerHTML = `
          <div class="card">
            <h2>Basic Info</h2>
            <p><strong>Name:</strong> Jane Doe</p>
            <p><strong>Email:</strong> janedoe@example.com</p>
            <p><strong>Phone:</strong> (555) 010-${(Math.random()*9000|0).toString().padStart(4,'0')}</p>
          </div>
        `;
      } else if (page === 'history') {
        out.innerHTML = `
          <div class="card">
            <h2>Service History</h2>
            <ul>
              <li>Service call on 2025-09-01: Installed router</li>
              <li>Ticket #1234 - Resolved</li>
              <li>Ticket #1201 - Pending follow-up</li>
            </ul>
          </div>
        `;
      } else if (page === 'bills') {
        out.innerHTML = `
          <div class="card">
            <h2>Bills & Payments</h2>
            <p><strong>Status:</strong> Latest invoice paid</p>
            <table border="0" width="100%">
              <tr><td>Invoice</td><td>2025-09</td><td>$120.00</td></tr>
              <tr><td>Invoice</td><td>2025-08</td><td>$95.00</td></tr>
            </table>
          </div>
        `;
      } else {
        // reflect unknown fragments (also vulnerable)
        out.innerHTML = `<div class="card"><h2>Unknown</h2><p>Fragment: ${page}</p></div>`;
      }
    }

    window.addEventListener('hashchange', route);
    window.addEventListener('load', route);
  </script>
</body>
</html>
