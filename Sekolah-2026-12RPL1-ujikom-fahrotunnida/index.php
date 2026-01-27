<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="proses-login.php" method="POST" class="border p-5 mt-5">

<h2>LOGIN</h2>

<?php
if(isset($_GET['pesan']) && $_GET['pesan']) { ?>
<div class="alert alert-danger"><?= $_GET['pesan'] ?></div>
<?php } ?>

<div>
<label>Username / NIS</label>
<input type="text" class="form-control" name="username" required>
</div>

<div>
<label>Password</label>
<input type="password" class="form-control" name="password" required>
</div>

<button type="submit" name="login" class="btn btn-primary mt-4">Login</button>

</form>
</body>
</html>