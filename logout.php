<!DOCTYPE html>
<html>
<body>

<?php
require_once __DIR__ . '/php/include.php';
Users::logoutUser();
?>

<script>
window.location = "index.php";
</script>

</body>
</html>
