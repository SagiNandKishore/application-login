<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="app-index.html" class="navbar-brand active">Home</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item p-3">
            <a href="app-signup.html" class="nav-link">Signup</a>
          </li>
          <li class="nav-item p-3">
            <a href="app-login.html" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-warning">
        <?php
          session_start();
          echo $_SESSION['ERROR']."<br />".$_SESSION['ERROR_MESSAGE']
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
