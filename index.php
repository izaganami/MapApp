<?php include("config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">
    <meta charset="utf-8">
    <title>JaBak WebMapping v-0.0</title>
    <link rel="icon" href="assets/images/JaBak.ico"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custome styles -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
    <script src="assets/js/Olscript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
    <link rel="stylesheet" href="Switcher/src/ol-layerswitcher.css" />
    <link rel="stylesheet" href="Switcher/examples/layerswitcher.css" />
    <script src="https://epsg.io/3857.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="Switcher/dist/ol-layerswitcher.js"></script>
    <script src="Switcher/examples/layerswitcher.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</head>
<?php include(INCLUDE_PATH . "/layouts/navindex.php") ?>
<?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
    </ol>
    <div class="carousel-inner" style="max-height: 600px">
        <div class="carousel-item active" id="data1">
            <img src="assets/images/map1.jpg" class="d-block w-100" height="800px" width="100%" >
        </div>
        <div class="carousel-item">
            <img src="assets/images/map3.jpg" class="d-block w-100" height="800px" width="100%" >
        </div>
        <div class="carousel-item">
            <img src="assets/images/map2.jpg" class="d-block w-100" height="800px" width="100%">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</br>
</br>
</br>
</br>
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class=".img-rounded" width="140" height="140" src="assets/images/naviguer.jpg">
            <h2>Naviguer sur une carte</h2>
            <p>Notre site vous octroie toutes les fonctionnalités de base du web mapping...</p>
            <p><a class="btn btn-secondary" href="#head1" role="button">details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class=".img-rounded" width="140" height="140" src="assets/images/info.jpg">
            <h2>Interroger Les données</h2>
            <p>Vous avez la possibilité d'accéder à la semantique des couches cartographiées...</p>
            <p><a class="btn btn-secondary" href="#head2" role="button">details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class=".img-rounded" width="140" height="140" src="assets/images/mesure.jpg">
            <h2>Effectuer des mesures</h2>
            <p>On vous permet aussi de mesurer distances et surfaces selon votre besoin et celà...</p>
            <p><a class="btn btn-secondary" href="#head3" role="button">details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading" id="head1">Naviguer <span class="text-muted">!</span></h2>
            <p class="lead">Notre site vous octroie toutes les fonctionnalités de base du web mapping y compris la possibilité de naviguer sur le fond de votre choix et avec les couches que vous voulez juste en un simple click de souris ! Pensez donc à visiter notre espace mapping pour plus d'informations.</p>
        </div>
        <div class="col-md-5">
            <img src="assets/images/naviguer.PNG" height="280" width="400">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" id="head2">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Accéder aux attributs? <span class="text-muted">Biensur !</span></h2>
            <p class="lead">Vous avez la possibilité d'accéder à la semantique des couches cartographiées non seulement celles que vous ajoutez mais aussi bien aux indicateurs que nous vous offrons et qui sont issus en premier lieu du recensement par district juste pour vous garantir une meilleure créibilité avec un service plutot simple.</p>
        </div>
        <div class="col-md-5 ">
            <img src="assets/images/semantique.PNG" height="280" width="400">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" id="head3">
        <div class="col-md-7">
            <h2 class="featurette-heading">Choisissez votre géométrie et mesurez <span class="text-muted">!</span></h2>
            <p class="lead">On vous permet aussi de mesurer distances et surfaces selon votre besoin et celà avec un menu bien simplifié sur lequel vous aurez le choix entre des distances projetées et meme des distances géodésiques et n'oubliez surtout pas que quoique ce soit votre polygon vouz pouvez générer aisement sa surface</p>
        </div>
        <div class="col-md-5">
            <img src="assets/images/mesurer.PNG" height="280" width="400">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div>


</body>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>








</html>


























