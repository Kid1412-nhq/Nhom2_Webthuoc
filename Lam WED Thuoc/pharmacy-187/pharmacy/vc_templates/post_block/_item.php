<?php
$block = $block_data[0];
$settings = $block_data[1];
?>
<?php if($block === 'title'): ?>
<h3 class="entry-title">
    <?php echo !empty($settings[0]) && $settings[0]!='no_link' ? $this->getLinked($post, $post->title, $settings[0], 'link_title') : $post->title ?>
</h3>
<?php elseif($block === 'image' && !empty($post->thumbnail)): ?>
<div class="entry-thumb">
    <?php echo !empty($settings[0]) && $settings[0]!='no_link' ? $this->getLinked($post, $post->thumbnail, $settings[0], 'link_image') : $post->thumbnail ?>
</div>
<?php elseif($block === 'text'): ?>
<div class="entry-content">
    <?php echo !empty($settings[0]) && $settings[0]==='text' ?  wpo_string_limit_words($post->content,30).'...' : wpo_string_limit_words($post->excerpt,25).'...'; ?>
</div>
<?php elseif($block === 'link'): ?>
<p class="entry-link"><a href="<?php echo $post->link ?>" class="btn btn-outline" title="<?php echo esc_attr(sprintf(__( 'Permalink to %s', 'pharmacy' ), $post->title_attribute)); ?>"<?php echo $this->link_target ?>><?php _e('Read more...', 'pharmacy') ?></a></p>
<?php endif; ?>