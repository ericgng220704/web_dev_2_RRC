<?php

/*******w******** 
    
    Name:Gia Hao Nguyen
    Date: 13 - 01 - 2024
    Description: Assignment 1

****************/

$config = [

    'gallery_name' => 'Eric_ngn_220704',
 
    'unsplash_categories' => ['building','street','fountain','cities'],
 
    'local_images' => ['Paris' => ['name' => 'Paris','num' => '1','credit' => 'Photo by <a href="https://unsplash.com/@earth?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Earth</a> on <a href="https://unsplash.com/photos/vehicles-travelling-on-road-surrounded-by-buildings-during-daytime-DXuxHw3S5ak?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>','alt' => 'vehicles-travelling-on-Paris-road-surrounded-by-buildings-during-daytime', 'image' => 'Paris.jpg', 'link' => 'https://unsplash.com/photos/vehicles-travelling-on-road-surrounded-by-buildings-during-daytime-DXuxHw3S5ak?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash'],
                       'Warsaw' => ['name' => 'Warsaw','num' => '2','credit' => 'Photo by <a href="https://unsplash.com/@valik_chern?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Valentyn Chernetskyi</a> on <a href="https://unsplash.com/photos/people-near-building-aZe5vVpmDCo?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>','alt' => 'people-near-building', 'image' => 'Warsaw.jpg', 'link' => 'https://unsplash.com/photos/people-near-building-aZe5vVpmDCo?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash'],
                       'Sydney' => ['name' => 'Sydney','num' => '3','credit' => 'Photo by <a href="https://unsplash.com/@kewal?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kewal</a> on <a href="https://unsplash.com/photos/syndey-opera-house-facing-body-of-water-under-cloudy-sky-Gpgcc_Z2p_g?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>','alt' => 'syndey-opera-house-facing-body-of-water-under-cloudy-sky', 'image' => 'Sydney.jpg', 'link' => 'https://unsplash.com/photos/syndey-opera-house-facing-body-of-water-under-cloudy-sky-Gpgcc_Z2p_g?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash'],
                       'Venice' => ['name' => 'Venice','num' => '4','credit' => 'Photo by <a href="https://unsplash.com/@damiano_baschiera?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Damiano Baschiera</a> on <a href="https://unsplash.com/photos/rialto-bridge-venice-italy-hFXZ5cNfkOk?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>','alt' => 'rialto-bridge-venice-italy', 'image' => 'Venice.jpg', 'link' => 'https://unsplash.com/photos/rialto-bridge-venice-italy-hFXZ5cNfkOk?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash']
                    //    ,'test' => ['name' => 'Sydney','num' => '5','credit' => 'Photo by <a href="https://unsplash.com/@kewal?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kewal</a> on <a href="https://unsplash.com/photos/syndey-opera-house-facing-body-of-water-under-cloudy-sky-Gpgcc_Z2p_g?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>','alt' => 'syndey-opera-house-facing-body-of-water-under-cloudy-sky', 'image' => 'Sydney.jpg', 'link' => 'https://unsplash.com/photos/syndey-opera-house-facing-body-of-water-under-cloudy-sky-Gpgcc_Z2p_g?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash']
    ]
 
];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">0
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Assignment 1</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <h1><?= $config['gallery_name'] ?></h1>
    <div class="galleries">
        <?php
            foreach($config['unsplash_categories'] as $category) : 
         ?>

         <div class="gallery__item">       
            <img src="https://source.unsplash.com/300x200/?<?= $category ?>" alt="<?= $category?> image">
            <h2 class ="gallery__item-heading"><?= $category ?></h2>
         </div>
         <?php endforeach ?>
    </div>

    <h1><?= count($config['local_images'])  ?> Local images </h1>
    <h2>This slider only work with fix number of images of 4, cause its fully made by css</h2>
    <h2>Add more images will cause it break, i just make it for fun hehe.</h2>
    <!-- this carousel css stuff is messy cuz i was confused with the images size at first. -->
    <div class="carousel">
        <input type="radio" name="slider" id="carousel__item-1"checked>  
        <input type="radio" name="slider" id="carousel__item-2">
        <input type="radio" name="slider" id="carousel__item-3" >
        <input type="radio" name="slider" id="carousel__item-4">
        <div class="carousel__items">
        <?php foreach($config['local_images'] as $local_image => $properties): ?> 
        
        <label for ="carousel__item-<?=$properties['num'] ?>" id ="idk-<?=$properties['num'] ?>" class="carousel__item">
            <h1 class="city"><?= $properties['name'] ?></h1>
            <h1 class="index"><?= $properties['num'] ?></h1>
            <h2 class="credit"><?= $properties['credit'] ?></h2>
            <img src="images/<?= $properties['image']?>" alt="<?=$properties['alt'] ?>">
        </label>          
            
        <?php endforeach ?>    
        </div>    
    </div>     
    
    <div class="js-slider">
    <h1>This one gonna work with dynamic number of images</h1>
    <div class="carousel--2">
        <div class="carousel__items--2">
        <?php foreach($config['local_images'] as $local_image => $properties): ?>   
            <div class="hidden img-box" id="<?= $properties['num']?>">
                 <h1 class="city--2"><?= $properties['name'] ?></h1>
                 <h1 class="index--2"><?= $properties['num'] ?></h1>
                 <h2 class="credit--2"><?= $properties['credit'] ?></h2>
                 <img src="images/<?= $properties['image']?>" alt="<?=$properties['alt'] ?>">   
            </div>
 
        <?php endforeach ?>    
        </div>    
        <button class="prev-button btn"><ion-icon name="chevron-back-outline"></ion-icon></button>
        <button class="next-button btn"><ion-icon name="chevron-forward-outline"></ion-icon></button>
    </div>   

    <h2>I was also thinking about making a bar showing numbers of images to track the current image, next and prev... but i think its enough for this assignemnt until this point.</h2>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>