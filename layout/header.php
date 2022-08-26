
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="./css/all.css">
    <!-- Castome Css -->
    <link rel="stylesheet" href="./css/main.css">
    <title><?php echo TITLE ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="./images/amazon-512.webp" alt="" width="30" height="30" class="d-inline-block align-text-top">
      <!-- <b>mazon</b> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><small><i class="fa-solid fa-cart-shopping"></i></small></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="index.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_date">
        <input type="submit" class="btn btn-danger" value="Search">
      </form>
    </div>
  </div>
</nav>
<body>