<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hola noticias!</title>
  </head>
  <body>
    <div class="container">
      <h1>Hola noticias! / <small id='newsCount'>0</small></h1>
        <div class='row'>
            <div id='baseCard' class='col-sm-12'>
              <div class='card'>
                <img class='card-img-top'/>
                <div class='card-body'>
                  <h5 class='card-title'>Cargando</h5>
                  <div class='card-text'>...</div>
                  <p>&nbsp;</p>
                  <div class='card-auth'>
                    <img class="img-thumbnail"/>
                    <span class='auth-name'><b>John Doe</b></span>
                  </div>
                  <p>&nbsp;</p>
                  <a target='_blank' href='#' class='btn btn-primary url'>Ver completo</a>
                </div>
              </div>
              <p>&nbsp;</p>
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul id='basePager' class="pagination">
          <li class="page-item"><a data-page='0' class="page-link" href="#" onclick='NewsApi.JumpToPage(this)'>0</a></li>
        </ul> 
      </nav>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="newsapi.js?r=<?= rand(1,100) ?>"></script>
    <script>$(document).ready(function(){NewsApi.loadNews()})</scrip>
  </body>
</html>