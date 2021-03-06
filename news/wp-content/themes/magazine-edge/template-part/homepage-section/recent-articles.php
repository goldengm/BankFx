<?php 
if ('' != magazine_edge_get_option('magazine_edge_show_homepage_recent_news_section')) : 
$magazine_edge_category = magazine_edge_get_option('magazine_edge_select_homepage_recent_news_category');
$magazine_edge_recent_news_title = magazine_edge_get_option('magazine_edge_recent_news_title');
$magazine_edge_all_posts = magazine_edge_get_posts(2, $magazine_edge_category);
if ($magazine_edge_all_posts->have_posts()) : ?>

    <div class="content">
        <div class="sec-title">
            <h2><?php echo esc_html($magazine_edge_recent_news_title); ?></h2>
        </div>

        <div class="row clearfix">
             <?php
                    while ($magazine_edge_all_posts->have_posts()) : $magazine_edge_all_posts->the_post();?>

                <div class="column col-md-6 col-sm-6 col-xs-12">
                    <!--News Block Two-->
                    <div class="news-block-two with-margin">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php the_permalink();?>">
                                    <?php 
                                    if(has_post_thumbnail()):
                                        the_post_thumbnail('magazine-edge-post'); 
                                    else:
                                    ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/391x383.jpg"> 
                                    <?php
                                    endif;?>
                                </a>
                                <div class="category">
                                    <?php
                                      $categories = get_the_category();
                                      $separator = ' ';
                                      $output = ' ';
                                      if ( ! empty( $categories ) ) :
                                        foreach ( $categories as $magzine_edge_cat ) {
                                          $output .= '<a href="'. esc_url( get_category_link( $magzine_edge_cat->term_id ) ) . '" class="bg-cat-3 cat-btn">' . esc_html( $magzine_edge_cat->name ) . '</a>' . $separator;
                                        }
                                        echo trim( $output, $separator );
                                      endif;
                                    ?>
                                </div> 
                            </div>
                            <div class="lower-box">
                                <h3><a href="<?php the_permalink();?>">
                                         <?php the_title(); ?></a></h3>
                                <ul class="post-meta">
                                   <?php
                                        magazine_edge_posted_by();
                                        magazine_edge_posted_on();
                                        magazine_edge_entry_footer();
                                    ?>
                                </ul>
                                <div class="text">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
             endwhile;
             wp_reset_postdata();
            ?>
        </div>

        <div class="row clearfix">

            <?php 
                    $magazine_edge_category2 = magazine_edge_get_option('magazine_edge_select_homepage_recent_news_category2');
                    $magazine_edge_all_posts2 = magazine_edge_get_posts(4, $magazine_edge_category2);
                    if ($magazine_edge_all_posts2->have_posts()) : 

                    while ($magazine_edge_all_posts2->have_posts()) : $magazine_edge_all_posts2->the_post();?>

                <div class="column col-md-6 col-sm-6 col-xs-12 blog-iso-item">
                    <!--Widget Post-->
                    <article class="widget-post">
                        <figure class="post-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    if(has_post_thumbnail()):
                                        the_post_thumbnail('magazine-edge-post'); 
                                    else:
                                    ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/391x383.jpg"> 
                                    <?php
                                    endif;
                                ?>
                            </a>
                        </figure>
                        <div class="text">
                            <a href="<?php the_permalink(); ?>">
                                 <?php the_title(); ?>
                            </a>
                        </div>
                        <div class="post-meta">
                            <?php magazine_edge_posted_on(); ?>
                        </div>
                    </article>
                </div>

            <?php
                 endwhile;
             endif;
                 wp_reset_postdata();
                ?>                      
        </div>
    </div>
               
<?php 
 endif;
 endif;
?>
