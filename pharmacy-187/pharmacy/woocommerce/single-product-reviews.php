<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments">
		<h2><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'pharmacy' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
			else
				_e( 'Reviews', 'pharmacy' );
		?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' 	=> '&larr;',
					'next_text' 	=> '&rarr;',
					'type'			=> 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'pharmacy' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'pharmacy' ) : __( 'Be the first to review', 'pharmacy' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'pharmacy' ),
						'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</span>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author form-group">' . '<label for="author" class="control-label">' . __( 'Name', 'pharmacy' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required/></p>',
							'email'  => '<p class="comment-form-email form-group"><label for="email" class="control-label">' . __( 'Email', 'pharmacy' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required/></p>',
						),
						'label_submit'  => __( 'Submit', 'pharmacy' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating form-group clearfix">
							<label for="rating" class="control-label">' . __( 'Your Rating', 'pharmacy' ) .'</label>
							<select name="rating" id="rating" aria-required="true" required>
								<option value="">' . __( 'Rate&hellip;', 'pharmacy' ) . '</option>
								<option value="5">' . __( 'Perfect', 'pharmacy' ) . '</option>
								<option value="4">' . __( 'Good', 'pharmacy' ) . '</option>
								<option value="3">' . __( 'Average', 'pharmacy' ) . '</option>
								<option value="2">' . __( 'Not that bad', 'pharmacy' ) . '</option>
								<option value="1">' . __( 'Very Poor', 'pharmacy' ) . '</option>
							</select>
						</p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment form-group"><label for="comment" class="control-label">' . __( 'Your Review', 'pharmacy' ) . '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true" required></textarea>' . '</p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'pharmacy' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>