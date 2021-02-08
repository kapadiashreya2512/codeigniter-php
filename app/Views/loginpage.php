<html>
<head>
<title>Login Page</title>
</head>
<h1>Admin Login</h1>
<body align="center">
<div class="container mt-5">
    <form method="post" id="login_user" name="login_user" 
    action="<?= site_url('/Crud/login_action') ?>"> 

      <div class="form-group">
        <label>Username::</label>
        <input type="text" name="username" class="form-control">
      </div>

      <div class="form-group">
        <label>Password:: </label>
        <input type="text" name="password" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Login</button>
      </div>
    </form>
  </div>
</table>
</body>
</html>