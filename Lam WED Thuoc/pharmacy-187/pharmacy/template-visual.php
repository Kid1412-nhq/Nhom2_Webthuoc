<?php
/*
*Template Name: Home Page
*
*/
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

$config = $wpo->getPageConfig();
?>

<?php get_header( get_header_layout() ); ?>
    <section id="wpo-mainbody" class="default-home wpo-mainbody">
        <div class="container ">
            <?php if($config['breadcrumb']){ ?>
                <?php wpo_breadcrumb(); ?>
            <?php } ?>
            <div class="row">
                <!-- MAIN CONTENT -->
                <div id="wpo-content" class="wpo-content <?php echo $config['main']['class']; ?>">
                    <?php if($config['showtitle']){ ?>
                        <h1 class="page-title"><span><?php the_title(); ?></span></h1>
                    <?php } ?>
                    <?php /* The loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                            <?php the_content(); ?>
                        </article><!-- #post -->
                        <?php //comments_template(); ?>
                    <?php endwhile; ?>
                </div>
                <!-- //MAIN CONTENT -->
                <?php /******************************* SIDEBAR LEFT ************************************/ ?>
                <?php if($config['left-sidebar']['show']){ ?>
                    <div class="wpo-sidebar wpo-sidebar-1 <?php echo $config['left-sidebar']['class']; ?>">
                        <?php if(is_active_sidebar($config['left-sidebar']['widget'])): ?>
                            <div class="sidebar-inner clearfix">
                                <?php dynamic_sidebar($config['left-sidebar']['widget']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <?php /******************************* END SIDEBAR LEFT *********************************/ ?>

                <?php /******************************* SIDEBAR RIGHT ************************************/ ?>
                <?php if($config['right-sidebar']['show']){ ?>
                    <div class="wpo-sidebar wpo-sidebar-2 <?php echo $config['right-sidebar']['class']; ?>">
                        <?php if(is_active_sidebar($config['right-sidebar']['widget'])): ?>
                            <div class="sidebar-inner clearfix">
                                <?php dynamic_sidebar($config['right-sidebar']['widget']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>