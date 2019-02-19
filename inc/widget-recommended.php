<?php
/**
 * Widget Category Post
 *
 * @package setopati
 */
 
// register Setopati_Category_Post_Recommended widget
function setopati_register_category_post_widget_recommended() {
    register_widget( 'Setopati_Category_Post_Recommended' );
}
add_action( 'widgets_init', 'setopati_register_category_post_widget_recommended' );
 
 /**
 * Adds Setopati_Category_Post_Recommended widget.
 */
class Setopati_Category_Post_Recommended extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'setopati_category_post_recommended', // Base ID
			__( 'Setopati Recommended Post', 'setopati' ), // Name
			array( 'description' => __( 'A Rrecommended Post Widget', 'setopati' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title          = !empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = !empty( $instance['num_post'] ) ? absint( $instance['num_post'] ) : 3 ;
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_postdate  = !empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        $cat            = !empty( $instance['cat'] ) ? $instance['cat'] : '';
        
        $qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $num_post,
			'no_found_rows' 		=> true,							
            'ignore_sticky_posts'   => true,
			'meta_key'		=> 'recommended',
			'meta_value'	=> '1'															
        ) );
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
            ?>
          <div class="lokpriya">            
            <ul>
            <?php
                while( $qry->have_posts() ){
                    $qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'setopati-widget-big', array( 'class' => 'img-responsive' ) );?>
                            </a>
                        <?php }elseif( ! has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-preview.png' ); ?>" alt="<?php the_title_attribute(); ?>" />
                            </a>
                        <?php }?>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="entry-meta">
                            <?php if( $show_postdate ){ ?>
                                	<span>
									<?php 
									$author_byline = get_field('byline');
									echo esc_html($author_byline);
									?>
                                    </span>             
                            <?php } ?>
                            </div>
                         </header>                       
                    </li>      
                <?php    
                }
            ?>
            </ul>
			</div>            
            <?php
            wp_reset_postdata(); 
            echo $args['after_widget'];   
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title          = !empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = !empty( $instance['num_post'] ) ? absint( $instance['num_post'] ) : 3 ;
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_postdate  = !empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        $cat            = !empty( $instance['cat'] ) ? $instance['cat'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'setopati' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
       
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php esc_html_e( 'Number of Posts', 'setopati' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'setopati' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php esc_html_e( 'Show Author Name', 'setopati' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */	 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
        $instance['title']          = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['cat']            = !empty( $new_instance['cat'] ) ? strip_tags( $new_instance['cat'] ) : '' ;
        $instance['num_post']       = !empty( $new_instance['num_post'] ) ? absint($new_instance['num_post']) : 3 ;        
        $instance['show_thumbnail'] = !empty( $new_instance['show_thumbnail'] ) ? esc_attr( $new_instance['show_thumbnail'] ) : '';
        $instance['show_postdate']  = !empty( $new_instance['show_postdate'] ) ? esc_attr( $new_instance['show_postdate'] ) : '';
		return $instance;
	}

} // class Setopati_Category_Post_Recommended