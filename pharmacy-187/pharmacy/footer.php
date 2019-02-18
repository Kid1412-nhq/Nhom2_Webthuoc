<?php
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
?>
		<footer id="wpo-footer" class="wpo-footer">
			<section class="footer-middle">
				<div class="container">
                    <div class="container-inner clearfix">
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="200ms" >
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="400ms" >
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="600ms" >
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 sm-clear col-sm-4 col-xs-12">
                            <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="800ms" >
                                <?php dynamic_sidebar('footer-4'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8  col-xs-12">
                            <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="1000ms" >
                                <?php dynamic_sidebar('footer-5'); ?>
                            </div>
                        </div>
                    </div>
				</div>
			</section>
            <section class="footer-bottom">
                <div class="container">
                    <div class="container-inner clearfix">
                        <div class="inner wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="200ms" >
                            <?php dynamic_sidebar('footer-6'); ?>
                        </div>
                    </div>
                </div>
            </section>
		</footer>
		<section class=" wpo-copyright">
            <div class="container">
                <div class="container-inner clearfix">
                    <div class="copyright col-md-6">
                        <address>
                            <?php echo of_get_option('copyright','Copyright 2014 Powered by <a href="http://themeforest.net/user/Opal_WP/?ref=dancof">OpalTheme</a> All Rights Reserved.'); ?>
                        </address>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $img_footer = of_get_option('image-footer','');
                        if($img_footer!=''){
                            ?>
                            <div class="paypal pull-right">
                                <img src="<?php echo $img_footer; ?>" alt="img-footer" />
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</section>
	</div>
	<!-- END Wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
