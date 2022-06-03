<head>
 <link rel="stylesheet" href="<?php echo URL; ?>/public/css/prod.css" />
</head>
<body>
    <div class="container-fluid">
    <div class="cards text-dark bg-light mb-3 offset-md-1" style="max-width: 1200px">
      <div class="row g-0">
        <div class="col-md-4 p-3">
                <img src="<?php echo $this->prod->img; ?>" class="card-img-top2" width="360px" height="300px" alt="...">
        </div>
        <div class="col-md-8 p-3">
                <div class="card-body">
                <h5><?php echo $this->prod->title; ?></h5>
                    <p class="card-text"><?php echo $this->prod->description; ?></p> 
                    <p class="card-title">Объем: <?php echo $this->prod->ML; ?></p>
                    <p class="card-title"><?php echo $this->prod->price; ?> руб.</p>
                       <a href="#" class="btn btn-outline-danger knopka">Добавить в корзину</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>