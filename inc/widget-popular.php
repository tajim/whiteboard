<?php
/**
 * Widget Popular Post
 *
 * @package setopati
 */
 
// register Setopati_Popular_Posts widget
function setopati_register_popular_posts_widget_big() {
    register_widget( 'Setopati_Popular_Posts' );
}
add_action( 'widgets_init', 'setopati_register_popular_posts_widget_big' );
 
 /**
 * Adds Setopati_Popular_Posts widget.
 */
class Setopati_Popular_Posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'setopati_popular_post_big', // Base ID
			__( 'Setopati Popular Posts', 'setopati' ), // Name
			array( 'description' => __( 'A Popular Posts Widget', 'setopati' ), ) // Args
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
        
        $qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $num_post,
			'no_found_rows' 		=> true,							
            'ignore_sticky_posts'   => true,
            'orderby' => 'meta_value_num',
            'meta_key' => '_setopati_view_count',
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
                        <?php
						if ( has_category('6')|| has_category('7') || has_category('8') || has_category('95')  ) {
						 $authorimage = get_field('author_photo');
							if ($authorimage && $show_thumbnail) {
								echo wp_get_attachment_image( $authorimage, array('111', '111'), "", array( "class" => "img-responsive bichar-img" ) );						
							}						 
						} 												
						else {						
						 if( has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'setopati-widget-big', array( 'class' => 'img-responsive' ) );?>
                            </a>
                        <?php }elseif( ! has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri(). '/img/defaultimg.png' ); ?>" alt="<?php the_title_attribute(); ?>" />
                            </a>
                        <?php }
						}
						?>
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
        $instance['num_post']       = !empty( $new_instance['num_post'] ) ? absint($new_instance['num_post']) : 3 ;        
        $instance['show_thumbnail'] = !empty( $new_instance['show_thumbnail'] ) ? esc_attr( $new_instance['show_thumbnail'] ) : '';
        $instance['show_postdate']  = !empty( $new_instance['show_postdate'] ) ? esc_attr( $new_instance['show_postdate'] ) : '';
		return $instance;
	}

} // class Setopati_Popular_Posts