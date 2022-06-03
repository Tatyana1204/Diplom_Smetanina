<head>
  <link rel="stylesheet" href="<?php echo URL; ?>/public/css/index.css" />
   <link rel="stylesheet" href="<?php echo URL; ?>/public/css/my-slider.css" />

</head>

<body>
  <!-- Создание слайдера  -->
  <div class="ism-slider" data-play_type="once-rewind" id="my-slider">
    <ol>
      <li>
        <img src="<?php echo URL; ?>/public/images/1.jpg">
      </li>
      <li>
        <img src="<?php echo URL; ?>/public/images/2.jpg">
      </li>
      <li>
        <img src="<?php echo URL; ?>/public/images/3.jpg">
      </li>
      <li>
        <img src="<?php echo URL; ?>/public/images/4.jpg">
      </li>
    </ol>
  </div>
 <script src="<?php echo URL; ?>/public/js/slider.js"></script>
 <!-- Создание кнопок категорий -->
   <div class="categoryblock">
     <?php foreach ($this->categories as $category){?>
                 <button type="button" class="categorybutton btn btn-outline-danger"><a class = "categorycart" href="<?php echo URL;?>/menu/categorize/<?php echo $category->id;?>"><?php echo $category->title;?></a></button>
     <?php } ?>
   </div>
 <!-- Создание карточек с категориями -->
  <div class="container-fluid">
    <?php foreach ($this->categories as $category){?>
<div class = "head">
    <div class="card text-dark bg-light mb-3 offset-md-1" style="max-width: 1200px">
      <div class="row g-0">
        <div class="col-md-4 p-3">
          <img src="<?php echo URL; ?>/<?php echo $category->img; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8 p-3">
          <div class="card-body">
            <h5 class="card-title"><?php echo $category->title; ?></h5>
            <p class="card-text"><?php echo $category->description; ?></p>
            <button type="button" class="btn btn-outline-danger"><a class="category" href="<?php echo URL;?>/menu/categorize/<?php echo $category->id;?>">Подробнее</a></button>
          </div>
        </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</body>
