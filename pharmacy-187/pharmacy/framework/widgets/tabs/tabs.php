<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

class WPO_Tabs_Widget extends WPO_Widget {
    public function __construct() {
        parent::__construct(
            // Base ID of your widget
            'wpo_tabs_widget',
            // Widget name will appear in UI
            __('WPO Tabs Widget', 'pharmacy'),
            // Widget description
            array( 'description' => __( 'Popular posts, recent post and comments.', 'pharmacy' ), )
        );
        $this->widgetName = 'tabs';
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        $posts = $instance['posts'];
        $comments = $instance['comments'];
        $tags_count = $instance['tags'];
        $show_popular_posts = isset($instance['show_popular_posts']) ? 'true' : 'false';
        $show_recent_posts = isset($instance['show_recent_posts']) ? 'true' : 'false';
        $show_comments = isset($instance['show_comments']) ? 'true' : 'false';
        $show_tags = isset($instance['show_tags']) ? 'true' : 'false';

        echo $before_widget;
            require($this->renderLayout($layout));
        echo $after_widget;
    }
// Widget Backend
    public function form( $instance ) {
        $defaults = array('posts' => 3, 'layout' => 'default' , 'comments' => '3', 'tags' => '3', 'show_popular_posts' => 'on', 'show_recent_posts' => 'on', 'show_comments' => 'on', 'show_tags' =>  'on');
        $instance = wp_parse_args((array) $instance, $defaults);
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php echo __('Template Style:', 'pharmacy'); ?></label>
            <br>
            <select name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>">
                <?php foreach ($this->selectLayout() as $key => $value): ?>
                    <option value="<?php echo $value; ?>" <?php selected( $instance['layout'], $value ); ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo __('Popular Posts Order By:', 'pharmacy'); ?></label>
            <select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" style="width:100%;">
                <option <?php if ('Highest Comments' == $instance['orderby']) echo 'selected="selected"'; ?>><?php echo __(' Highest Comments', 'pharmacy' ); ?></option>
                <option <?php if ('Highest Views' == $instance['orderby']) echo 'selected="selected"'; ?>><?php echo __('Highest Views', 'pharmacy' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts'); ?>"><?php echo __('Number of popular posts:', 'pharmacy' ); ?></label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php echo __('Number of recent posts:', 'pharmacy' ); ?></label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" value="<?php echo $instance['tags']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('comments'); ?>"><?php echo __('Number of comments:', 'pharmacy' ); ?></label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" value="<?php echo $instance['comments']; ?>" />
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_popular_posts'], 'on'); ?> id="<?php echo $this->get_field_id('show_popular_posts'); ?>" name="<?php echo $this->get_field_name('show_popular_posts'); ?>" />
            <label for="<?php echo $this->get_field_id('show_popular_posts'); ?>"><?php echo __('Show popular posts', 'pharmacy' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_recent_posts'], 'on'); ?> id="<?php echo $this->get_field_id('show_recent_posts'); ?>" name="<?php echo $this->get_field_name('show_recent_posts'); ?>" />
            <label for="<?php echo $this->get_field_id('show_recent_posts'); ?>"><?php echo __('Show recent posts', 'pharmacy' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 'on'); ?> id="<?php echo $this->get_field_id('show_comments'); ?>" name="<?php echo $this->get_field_name('show_comments'); ?>" />
            <label for="<?php echo $this->get_field_id('show_comments'); ?>"><?php echo __('Show comments', 'pharmacy' ); ?></label>
        </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['posts'] = $new_instance['posts'];
        $instance['comments'] = $new_instance['comments'];
        $instance['tags'] = $new_instance['tags'];
        $instance['show_popular_posts'] = $new_instance['show_popular_posts'];
        $instance['show_recent_posts'] = $new_instance['show_recent_posts'];
        $instance['show_comments'] = $new_instance['show_comments'];
        $instance['show_tags'] = $new_instance['show_tags'];
        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? $new_instance['layout'] : 'default';
        return $instance;

    }
}

register_widget( 'WPO_Tabs_Widget' );