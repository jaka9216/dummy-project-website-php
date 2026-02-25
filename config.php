<?php
$conn = new PDO("mysql:host=localhost;dbname=portfolio_pro","DB_USER","DB_PASS");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
