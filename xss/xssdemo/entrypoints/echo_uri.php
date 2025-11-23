<!doctype html>

<body>
    <h1>Something broke</h1>
    <pre>Request: <?php echo urldecode($_SERVER['REQUEST_URI']); ?></pre> <!-- vulnerable -->
</body>

</html>