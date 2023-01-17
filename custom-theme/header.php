<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php if (is_front_page()) { echo "Listing Page"; } else { the_title(); } ?></title>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <a href="/"><img src="/wp-content/uploads/2023/01/PB-LogoSmall.png" alt="Logo"></a>
            <a href="/listings" class="btn">View Listings</a>
        </div>  
    </header>