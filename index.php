<?php  
/**
 * [index.php]
 *
 * The main template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */

get_header(); ?>
    <div class="marcador-hero-post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <header class="marcador-hero-unit" style="background-image: url(http://placehold.it/1400x600/2c3e50/ffffff&text=Marcador+Hero+Post);">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="hero-heading">
                                        <h1>Quam quae et sapiente ducimus vero velit autem temporibus, quos veniam, dicta fuga, tempora, reiciendis.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <?php while (have_posts()) : the_post(); ?>
            <div class="col-lg-4 visible-lg-block">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%;height:200px;background:#ccc">
                <!--  -->
                <?php the_post_thumbnail('thumbnail'); ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer(); ?>
