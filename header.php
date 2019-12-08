<!DOCTYPE html>
<html lang="ja">
<?php global $global_uri;
global $dir_uri;
$dir_uri = get_stylesheet_directory_uri();
?>

<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ディスクリプション">
    <meta name="Keywords" content="">
    <title><?php if (is_front_page()) : ?>タイトル<?php else : ?><?php wp_title(''); ?> |
        <?php bloginfo('name'); ?><?php endif; ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $global_uri; ?>/assets/images/common/favicon.ico">
    <link href="<?php echo $global_uri; ?>/assets/application.css" rel="stylesheet" media="all" type="text/css">
    <meta property="og:title" content="title">
    <meta property="og:description" content="テキスト">
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:site_name" content="">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="#">
    <?php
    wp_dequeue_style('jetpack-top-posts-widget');
    if (has_action('wp_head', '_admin_bar_bump_cb')) remove_action('wp_head', '_admin_bar_bump_cb');
    wp_head();
    ?>
</head>

<!-- Body -->
<body>
    <header>
        Header
    </header>