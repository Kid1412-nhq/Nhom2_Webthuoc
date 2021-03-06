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

if ( post_password_required() ){
    return;
}
?>
<div id="comments">
    <div class="title">
        <h6><?php comments_number( __('0 Comment', 'pharmacy'), __('1 Comment', 'pharmacy'), __('% Comments', 'pharmacy') ); ?></h6>
    </div>
    <?php if ( have_comments() ) { ?>
        <div class="wpo-commentlists">
    	    <ol class="commentlists">
    	        <?php wp_list_comments('callback=wpo_theme_comment'); ?>
    	    </ol>
    	    <?php
    	    	// Are there comments to navigate through?
    	    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    	    ?>
    	    <footer class="navigation comment-navigation" role="navigation">
    	        <div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pharmacy' ) ); ?></div>
    	        <div class="next right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pharmacy' ) ); ?></div>
    	    </footer><!-- .comment-navigation -->
    	    <?php endif; // Check for comment navigation ?>

    	    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    	        <p class="no-comments"><?php _e( 'Comments are closed.' , 'pharmacy' ); ?></p>
    	    <?php endif; ?>
        </div>
    <?php } ?>

	<?php
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                        'title_reply'=> __('<div class="title">'.__('Leave a Comment','pharmacy').'</div>','pharmacy'),
                        'comment_field' => '<div class="form-group">
                                                <label class="field-label" for="comment">'.__('Comment: ', 'pharmacy' ).'</label>
                                                <textarea rows="8" id="comment" class="form-control"  name="comment"'.$aria_req.'></textarea>
                                            </div>',
                        'fields' => apply_filters(
                        	'comment_form_default_fields',
                    		array(
                                'author' => '<div class="form-group">
                                            <label for="author">'.__('Name:', 'pharmacy').'</label>
                                            <input type="text" name="author" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                                            </div>',
                                'email' => ' <div class="form-group">
                                            <label for="email">'.__('Email:', 'pharmacy').'</label>
                                            <input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                                            </div>',
                                'url' => '<div class="form-group">
                                            <label for="url">'.__('Website:', 'pharmacy').'</label>
                                            <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
                                            </div>',
                            )),
                        'label_submit' => __('Post Comment', 'pharmacy' ),
						'comment_notes_before' => '<div class="form-group h-info">'.__('Your email address will not be published.','pharmacy').'</div>',
						'comment_notes_after' => '',
                        );
    ?>
	<?php global $post; ?>
	<?php if('open' == $post->comment_status){ ?>
	<div class="commentform row reset-button-default">
    	<div class="col-sm-12">
			<?php wpo_comment_form($comment_args); ?>
    	</div>
    </div><!-- end commentform -->
	<?php } ?>
</div><!-- end comments -->