<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?=url('carousel/pexels-pixabay-247431.jpg')?>" alt="img 1" width="100%" height="500">
        </div>
        <div class="carousel-item">
            <img src="<?=url('carousel/pexels-pixabay-40896.jpg')?>"  alt="img 2" width="100%" height="500">
        </div>
        <div class="carousel-item">
            <img src="<?=url('carousel/pexels-pixabay-38537.jpg')?>"  alt="img 3" width="100%" height="500">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>