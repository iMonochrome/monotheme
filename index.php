<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if (is_front_page()) : ?><?php else : ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php endif; ?></title>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@3.0.0/dist/css/yakuhanmp.min.css">
    <link href="<?php echo $global_uri; ?>/assets/css/application.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
    <header></header>
    <main>
    </main>
    <footer></footer>
    <script src="/assets/js/application.js"></script>
</body>

</html>