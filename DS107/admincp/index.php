<?php
session_start();
if (!isset($_SESSION['dangnhap'])) {
    header('Location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <title>Admincp</title>
</head>
<script src="../js/script.js"></script>
<script src="../js/madonhang-search.js"></script>
<script src="../js/customer-search.js"></script>
<script src="../js/masanpham-search.js"></script>
<body>
<div class="wrapper">
    <?php include 'config/config.php'; ?>
    <?php include 'modules/header.php'; ?>
    <?php include 'modules/menu.php'; ?>
    <?php include 'modules/main.php'; ?>
    <?php include 'modules/footer.php'; ?>
    
</div>
<link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
<script type="module">
	import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

	createChat({
		webhookUrl: 'https://datwebsite.app.n8n.cloud/webhook/53c136fe-3e77-4709-a143-fe82746dd8b6/chat'
	});
</script>
</body>
</html>
