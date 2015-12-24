<?php
if ( ! class_exists( 'Pet_Comments' ) ) :
    class Pet_Comments extends Walker_Comment{

	// Init classwide variables.
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() { ?>

	<ol class="comment-list">

<?php }

/** START_LVL
 * Starts the list before the CHILD elements are added. */
function start_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 1; ?>
		<ul class="children">
<?php }

/** END_LVL
 * Ends the children list of after the elements are added. */
function end_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 1; ?>
		</ul><!-- /.children -->
<?php }

/** START_EL */
function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

	<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
	    <article id="comment-body-<?php comment_ID() ?>" class="comment-body row">
		<header class="comment-author large-3 small-12 columns">	
			<time datetime="<?= comment_date( 'c' ) ?>"><?= get_comment_date( 'n בM, Y') ?></time>
			<cite>מאת <?= get_comment_author() ?></cite>
		</header>

		<section id="comment-content-<?php comment_ID(); ?>" class="comment large-9 small-12 columns">
		    <?php comment_text() ?>
		</section><!-- /.comment-content -->
	    </article><!-- /.comment-body -->

<?php }

function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
	</li>
<?php }

/** DESTRUCTOR */
function __destruct() { ?>
    </ol>
<?php }
    }
endif;
?>
