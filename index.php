<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link rel="stylesheet" href="main.css">
    <script src="script.js" defer></script>
</head>
<body>

<h1>Building a Dynamic Form with PHP</h1>

<p1>Colin Newman</p1>

<p2>11/10/2025</p2>

<form method="POST" action="confirm.php">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="message">Message:</label><br>
  <textarea id="message" name="message" rows="5" required></textarea><br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>