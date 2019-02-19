<?php
/**
 * Recent Reviews Widget
 *
 * @author 		WooThemes
 * @category 	Widgets
 * @package 	WooCommerce/Widgets
 * @version 	2.1.0
 * @extends 	WC_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPO_Widget_Recent_Reviews extends WC_Widget_Recent_Reviews {


	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	 public function widget( $args, $instance ) {
		global $comments, $comment, $woocommerce;

		if ( $this->get_cached_widget( $args ) )
			return;

		ob_start();
		extract( $args );

		$title    = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$number   = absint( $instance['number'] );
		$comments = get_comments( array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish', 'post_type' => 'product' ) );

		if ( $comments ) {
			echo $before_widget;
			if ( $title ) echo $before_title . $title . $after_title;
			echo '<div class="product_list_widget widget-content ">';
            $_delay=150;
			foreach ( (array) $comments as $comment ) {

				$_product = get_product( $comment->comment_post_ID );

				$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

				$rating_html = wc_get_rating_html( $_product->get_average_rating() );

				echo '<div class="media widget-product wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="'.$_delay.'ms"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" class="image pull-left">';

				echo $_product->get_image().'</a>';

				echo '<div class="media-body"><h3 class="name"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">';

				echo $_product->get_name().'</a></h3>';

				echo '<div class="rating pull-left">';
					echo $rating_html;
				echo '</div>';

				printf( '<div class="review"><span class="reviewer">' . _x( 'by %1$s', 'by comment author', 'pharmacy' ) . '</span></div>', get_comment_author() );

				echo '</div></div>';
                $_delay+=200;
			}

			echo '</div>';
			echo $after_widget;
		}

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}

register_widget( 'WPO_Widget_Recent_Reviews' );