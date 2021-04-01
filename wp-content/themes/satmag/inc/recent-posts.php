<?php
/*
|
|	Plugin Name: Satmag Recent Posts
|	Description: A widget to display Recent Posts.
|	Version: 1.0
|
*/

/*
|------------------------------------------------------------------------------
| Recent Posts Widget Class
|------------------------------------------------------------------------------
*/

class Satmag_Recent_Posts_Widget extends WP_Widget {

	/*
	|------------------------------------------------------------------------------
	| Widget Setup
	|------------------------------------------------------------------------------
	|
	| @return void
	|
	*/
	public function __construct() {
		$widget_ops = array(
			'classname'		=> 'satmag-recent-posts-widget',
			'description'	=> __('Satmag Recent Posts', 'satmag')
		);

		$control_ops = array(
			'id_base' => 'satmag-recent-posts'
		);

		parent::__construct('satmag-recent-posts', __('Satmag: Recent Posts', 'satmag'), $widget_ops, $control_ops);
	}

	/*
	|------------------------------------------------------------------------------
	| Display Widget
	|------------------------------------------------------------------------------
	|
	| @return void
	|
	*/
	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : 'Recent Posts' );
		$comment_num = isset( $instance['comment_num'] ) ? $instance['comment_num'] : '1';
		$author = isset( $instance['author'] ) ? $instance['author'] : '1';
		$date = isset( $instance['date'] ) ? $instance['date'] : '1';
		$qty = (int) isset( $instance['qty'] ) ? $instance['qty'] : '5';
		$show_thumbnail_1 = (int) isset( $instance['show_thumbnail_1'] ) ? $instance['show_thumbnail_1'] : '1';
		$show_excerpt = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : '1' ;
		$excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : '10';


		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}

		echo self::satmag_get_recent_posts( $qty, $comment_num, $date, $author, $show_thumbnail_1, $show_excerpt, $excerpt_length );
		echo $after_widget;

	}
	/*
	|------------------------------------------------------------------------------
	| Update Widget
	|------------------------------------------------------------------------------
	|
	| @return void
	|
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['qty'] = intval( $new_instance['qty'] );
		$instance['comment_num'] = intval( $new_instance['comment_num'] );
		$instance['author'] = intval( $new_instance['author'] );
		$instance['date'] = intval( $new_instance['date'] );
		$instance['show_thumbnail_1'] = intval( $new_instance['show_thumbnail_1'] );
		$instance['show_excerpt'] = intval( $new_instance['show_excerpt'] );
		$instance['excerpt_length'] = intval( $new_instance['excerpt_length'] );
		return $instance;
	}

	/*
	|------------------------------------------------------------------------------
	| Widget Settings
	|------------------------------------------------------------------------------
	|
	| Displays the widget settings controls on the widget panel
	|
	| @return void
	|
	*/
	public function form( $instance ) {
		$defaults = array(
			'comment_num' => 1,
			'date' => 1,
			'author' => 1,
			'show_thumbnail_1' => 1,
			'show_excerpt' => 0,
			'excerpt_length' => 10
		);

		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Recent Posts','satmag' );
		$qty = isset( $instance[ 'qty' ] ) ? esc_attr( $instance[ 'qty' ] ) : 5;
		$comment_num = isset( $instance[ 'comment_num' ] ) ? esc_attr( $instance[ 'comment_num' ] ) : 1;
		$author = isset( $instance[ 'author' ] ) ? esc_attr( $instance[ 'author' ] ) : 1;
		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? esc_attr( $instance[ 'show_excerpt' ] ) : 1;
		$date = isset( $instance[ 'date' ] ) ? esc_attr( $instance[ 'date' ] ) : 1;
		$excerpt_length = isset( $instance[ 'excerpt_length' ] ) ? intval( $instance[ 'excerpt_length' ] ) : 10;
		$show_thumbnail_1 = isset( $instance[ 'show_thumbnail_1' ] ) ? esc_attr( $instance[ 'show_thumbnail_1' ] ) : 1;
		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? esc_attr( $instance[ 'show_excerpt' ] ) : 1;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','satmag' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php esc_html_e( 'Number of Posts to show','satmag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'qty' ); ?>" name="<?php echo $this->get_field_name( 'qty' ); ?>" type="number" min="1" step="1" value="<?php echo $qty; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_thumbnail_1"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumbnail_1"); ?>" name="<?php echo $this->get_field_name("show_thumbnail_1"); ?>" value="1" <?php if (isset($instance['show_thumbnail_1'])) { checked( 1, $instance['show_thumbnail_1'], true ); } ?> />
				<?php esc_html_e( 'Show Thumbnails', 'satmag'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>" value="1" <?php checked( 1, $instance['date'], true ); ?> />
				<?php esc_html_e( 'Show post date', 'satmag'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("comment_num"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>" name="<?php echo $this->get_field_name("comment_num"); ?>" value="1" <?php checked( 1, $instance['comment_num'], true ); ?> />
				<?php esc_html_e( 'Show number of comments', 'satmag'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("author"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("author"); ?>" name="<?php echo $this->get_field_name("author"); ?>" value="1" <?php checked( 1, $instance['author'], true ); ?> />
				<?php esc_html_e( 'Show Author', 'satmag'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_excerpt"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_excerpt"); ?>" name="<?php echo $this->get_field_name("show_excerpt"); ?>" value="1" <?php checked( 1, $instance['show_excerpt'], true ); ?> />
				<?php esc_html_e( 'Show excerpt', 'satmag'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php esc_html_e( 'Excerpt Length:', 'satmag' ); ?>
			<input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $excerpt_length ); ?>" />
			</label>
		</p>

		<?php
	}

	/*
	|------------------------------------------------------------------------------
	| Get Recent Posts
	|------------------------------------------------------------------------------
	|
	| To display recent posts by user filter
	|
	| @return void
	|
	*/
	public function satmag_get_recent_posts( $qty, $comment_num, $date, $author, $show_thumbnail_1, $show_excerpt, $excerpt_length ) {

		$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';

		$posts = new WP_Query(
			"orderby=date&order=DESC&posts_per_page=".$qty
		);

		if ($show_thumbnail_1 != 1) :
		 	echo '<ul class="satmag-recent-posts no-thumbnail">';
		else :
			echo '<ul class="satmag-recent-posts have-thumbnail">';
		endif;

		while ( $posts->have_posts() ) :
		$posts->the_post(); ?>
			<li>
				<?php
				if ( has_post_thumbnail() && $show_thumbnail_1 ) : ?>
					<div class="post-img">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('satmag-medium-thumbnail', array('title' => '')); ?>
						</a>
					</div>
				<?php elseif ( !has_post_thumbnail() && $show_thumbnail_1 ) : ?>
					<div class="post-img">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/widget-thumbnails.jpg" />
						</a>
					</div>
				<?php endif; ?>

				<div class="post-data">
					
					<h3 class="wid-title">
						<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h3>

					<div class="post-meta">

						<?php if ( $date == 1 ) : ?>
							<span><?php the_time('F j, Y'); ?></span>
						<?php endif; ?>
						
						<?php if ( $date == 1 && $comment_num == 1 ) : ?><?php endif; ?>

						<?php
							if ( $author == 1 ) {
								printf( '<span class="author">' . esc_html__( ' By %1$s ', 'satmag' ) . ' </span>', $byline );
							}
						?>

						<?php if ( $comment_num == 1 ) : ?>
							<?php echo comments_number(__('<span>No Comment</span>','satmag'), __('<span>One Comment</span>','satmag'), '<span class="comm">% Comments</span> ');?>
						<?php endif; ?>
					</div> <!--end .entry-meta-->

					<?php if ( $show_excerpt == 1 ) : ?>
						<p>
							<?php echo satmag_excerpt($excerpt_length); ?>
						</p>
					<?php endif; ?>
				</div>
				<span class="clear"></span>
			</li>
		<?php
		endwhile;
		echo '</ul>'."\r\n";
	}

}

/*
|------------------------------------------------------------------------------
| Load Widgets
|------------------------------------------------------------------------------
*/
add_action('widgets_init', 'satmag_recent_posts_load_widgets');

/*
 |------------------------------------------------------------------------------
 | Register widget
 |------------------------------------------------------------------------------
 |
 | @return void
 |
 */
function satmag_recent_posts_load_widgets()
{
	register_widget('Satmag_Recent_Posts_Widget');
}
