<?php get_header(); ?>

<main>
<!-- アクセスされたページ種別でタイトルの文字を調整 -->
<?php
    $page_title = "";
    if(is_category()){
        $page_title = "カテゴリー「" . single_cat_title("", false) . "」";
    }else if(is_tag()){
        $page_title = "タグ「" . single_tag_title("", false) . "」";
    }else if(is_date()){
        $page_title = get_the_date("Y年n月");
    }
    $page_title .= "の記事一覧";
?>

<!-- タイトルを出力 -->
<h1><?php echo $page_title; ?></h1>

<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php the_post(); ?>
        <div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_post_thumbnail("medium"); ?>
            <?php the_excerpt(); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<!-- ページネーションを表示する関数を呼び出し -->
<?php the_pagenation(); ?>


<?php get_footer(); ?>