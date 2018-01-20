<?php

function register_widget_position() {
    register_sidebar(
            array(
                'name' => __('Left'),
                'id' => 'left',
                'before_title' => '<h1>',
                'after_title' => '</h1>'
            )
    );
    register_sidebar(
            array(
                'name' => __('Right'),
                'id' => 'right',
                'before_title' => '<h1>',
                'after_title' => '</h1>'
            )
    );
    register_sidebar(
            array(
                'name' => __('Right Taxonomy'),
                'id' => 'right_taxonomy',
                'before_title' => '<h1>',
                'after_title' => '</h1>'
            )
    );
}

add_action('widgets_init', 'register_widget_position');

function register_widget_member() {
    register_widget('show_categories_game');
    //register_widget('show_game_cung_loai');
}

add_action('widgets_init', 'register_widget_member');

//=================================================================================
class show_categories_game extends WP_Widget {

    function show_categories_game() {
        parent::__construct(false, 'Categories Game');
    }

    function widget($args, $instance) {
        extract($args);
        $title = esc_attr($instance['title']);
        $tax_slug = esc_attr($instance['tax_slug']);
        ?>
        <div class="box-bar left-menu"> 
            <?php
            $taxonomy = get_query_var('taxonomy');
            if (empty($taxonomy)) {
                $taxonomy = $tax_slug;
            }

            $tax_terms = get_terms($taxonomy);
            ?>
            <div class="category-game">
                <h2 class="title"><?php echo $title ?></h2>
                <ul>
                            <?php foreach ($tax_terms as $tax_term) { ?>                            
                        <li>
                            <a href="<?php echo get_term_link($tax_term); ?>">
                                <i class="glyphicon glyphicon-star-empty"></i>
            <?php echo $tax_term->name ?>
                            </a>
                        </li>
        <?php } ?>
                </ul>
            </div>
        </div> 
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['tax_slug'] = strip_tags($new_instance['tax_slug']);
        return $instance;
    }

    function form($instance) {
        $tax_slug = esc_attr($instance['tax_slug']);
        $title = esc_attr($instance['title']);
        ?>

        <p><label>Title categories</label></p>
        <p>
            <input width="100%" type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo $title ?>" />
        </p>
        <p><label>Taxonomy slug</label></p>
        <input width="100%" type="text" id="<?php echo $this->get_field_id('tax_slug') ?>" name="<?php echo $this->get_field_name('tax_slug') ?>" value="<?php echo $tax_slug ?>" />
        <?php
    }

}

?>