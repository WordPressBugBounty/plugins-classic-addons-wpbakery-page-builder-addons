<?php
/**
 * Post Grid Addon Template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBakeryShortCode_CAW_Post_Grid extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {

		$atts = shortcode_atts( array(
			// Query
			'post_type'        => 'post',
			'taxonomy'         => '',
			'terms'            => '',
			'authors'          => '',
			'posts_per_page'   => '6',
			'offset'           => '0',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'exclude_current'  => '',
			'ignore_sticky'    => 'yes',
			// Layout
			'layout'           => 'grid',
			'cols_desktop'     => '3',
			'cols_tablet'      => '2',
			'cols_mobile'      => '1',
			'col_gap'          => '24px',
			'row_gap'          => '24px',
			'preset'           => 'classic',
			// Display
			'show_image'       => 'yes',
			'image_size'       => 'medium_large',
			'crop_aspect'      => '',
			'aspect_ratio'     => '16/9',
			'img_hover'        => 'zoom',
			'show_title'       => 'yes',
			'title_tag'        => 'h3',
			'title_limit'      => '',
			'show_excerpt'     => 'yes',
			'excerpt_unit'     => 'words',
			'excerpt_limit'    => '20',
			'show_readmore'    => 'yes',
			'readmore_text'    => 'Read More',
			// Meta
			'show_meta'        => 'yes',
			'meta_author'      => 'yes',
			'meta_date'        => 'yes',
			'meta_category'    => '',
			'meta_comments'    => '',
			// Links
			'link_title'       => 'yes',
			'link_image'       => 'yes',
			'link_new_tab'     => '',
			// Pagination
			'pagination'       => 'none',
			'loadmore_text'    => 'Load More',
			// Empty
			'empty_message'    => 'No posts found.',
			// Style
			'card_bg'          => '',
			'card_padding'     => '',
			'card_border_color' => '',
			'card_border_width' => '',
			'card_radius'      => '',
			'card_shadow'      => 'light',
			'title_color'      => '',
			'title_font_size'  => '',
			'title_font_weight' => '',
			'meta_color'       => '',
			'excerpt_color'    => '',
			'btn_bg'           => '',
			'btn_color'        => '',
			'btn_bg_hover'     => '',
			'btn_color_hover'  => '',
			'cssbox'           => '',
		), $attrs );

		extract( $atts );

		$addon_base   = $this->settings['base'];
		$addon_handle = 'caw-post-grid';

		wp_enqueue_style( $addon_handle, CAWPB_URL . '/addons/post-grid/post-grid.css', array(), CAWPB_VERSION );
		wp_enqueue_script( $addon_handle, CAWPB_URL . '/addons/post-grid/post-grid.js', array(), CAWPB_VERSION, true );

		$cssbox = cawpb_add_inline_style( $cssbox, $addon_base, $attrs, $addon_handle );
		$uid    = 'caw-pg-' . wp_unique_id();

		// Sanitize layout/preset.
		$layout         = $layout === 'masonry' ? 'masonry' : 'grid';
		$preset         = in_array( $preset, array( 'classic', 'minimal', 'modern' ), true ) ? $preset : 'classic';
		$card_shadow    = in_array( $card_shadow, array( 'none', 'light', 'medium', 'heavy' ), true ) ? $card_shadow : 'light';
		$img_hover      = in_array( $img_hover, array( 'none', 'zoom', 'fade' ), true ) ? $img_hover : 'none';

		// Sanitize allowed title tag.
		$allowed_tags = array( 'h1','h2','h3','h4','h5','h6','div' );
		$title_tag = in_array( strtolower( $title_tag ), $allowed_tags, true ) ? strtolower( $title_tag ) : 'h3';

		// Determine current page for numbered pagination.
		$paged = 1;
		$page_qkey = 'caw_pg_' . substr( md5( $uid ), 0, 6 );
		// Public, read-only pagination param; cast to int sanitises it, no nonce needed.
		if ( $pagination === 'numbered' && isset( $_GET[ $page_qkey ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$paged = max( 1, (int) $_GET[ $page_qkey ] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		}

		$query_args = $this->build_query_args( $atts, $paged );
		$query      = new WP_Query( $query_args );

		// Build inline styles.
		$cols_d = max( 1, (int) $cols_desktop );
		$cols_t = max( 1, (int) $cols_tablet );
		$cols_m = max( 1, (int) $cols_mobile );
		$col_gap_v = $col_gap !== '' ? $col_gap : '24px';
		$row_gap_v = $row_gap !== '' ? $row_gap : '24px';

		$grid_istyle = '';
		$grid_istyle .= '--caw-pg-cols-d:' . $cols_d . ';';
		$grid_istyle .= '--caw-pg-cols-t:' . $cols_t . ';';
		$grid_istyle .= '--caw-pg-cols-m:' . $cols_m . ';';
		$grid_istyle .= '--caw-pg-col-gap:' . $col_gap_v . ';';
		$grid_istyle .= '--caw-pg-row-gap:' . $row_gap_v . ';';

		$card_istyle = '';
		if ( $card_bg !== '' )           { $card_istyle .= 'background-color:' . $card_bg . ';'; }
		if ( $card_padding !== '' )      { $card_istyle .= 'padding:' . $card_padding . ';'; }
		if ( $card_border_color !== '' && $card_border_width !== '' ) {
			$card_istyle .= 'border:' . $card_border_width . ' solid ' . $card_border_color . ';';
		}
		if ( $card_radius !== '' )       { $card_istyle .= 'border-radius:' . $card_radius . ';'; }

		$title_istyle = '';
		if ( $title_color !== '' )       { $title_istyle .= 'color:' . $title_color . ';'; }
		if ( $title_font_size !== '' )   { $title_istyle .= 'font-size:' . $title_font_size . ';'; }
		if ( $title_font_weight !== '' ) { $title_istyle .= 'font-weight:' . $title_font_weight . ';'; }

		$meta_istyle    = $meta_color !== ''    ? 'color:' . $meta_color . ';'    : '';
		$excerpt_istyle = $excerpt_color !== '' ? 'color:' . $excerpt_color . ';' : '';

		$btn_istyle = '';
		if ( $btn_bg !== '' )    { $btn_istyle .= 'background-color:' . $btn_bg . ';'; }
		if ( $btn_color !== '' ) { $btn_istyle .= 'color:' . $btn_color . ';'; }

		$img_istyle = '';
		if ( $crop_aspect === 'yes' && $aspect_ratio !== '' ) {
			$img_istyle .= 'aspect-ratio:' . $aspect_ratio . ';';
		}

		$wrapper_classes   = array();
		$wrapper_classes[] = 'caw-post-grid';
		$wrapper_classes[] = 'caw-pg-layout-' . $layout;
		$wrapper_classes[] = 'caw-pg-preset-' . $preset;
		$wrapper_classes[] = 'caw-pg-shadow-' . $card_shadow;
		$wrapper_classes[] = 'caw-pg-imghover-' . $img_hover;
		if ( $crop_aspect === 'yes' ) { $wrapper_classes[] = 'caw-pg-cropped'; }
		$wrapper_classes[] = $cssbox;

		$open_target = $link_new_tab === 'yes' ? '_blank' : '_self';
		$open_rel    = $link_new_tab === 'yes' ? 'noopener noreferrer' : '';

		ob_start(); ?>
		<div id="<?php echo esc_attr( $uid ); ?>"
			class="<?php echo esc_attr( cawpb_sanitize_html_classes( $wrapper_classes ) ); ?>"
			style="<?php echo esc_attr( $grid_istyle ); ?>"
			data-pagination="<?php echo esc_attr( $pagination ); ?>">

			<?php if ( ! $query->have_posts() ) : ?>
				<div class="caw-pg-empty"><?php echo esc_html( $empty_message ); ?></div>
			<?php else : ?>
				<div class="caw-pg-items">
					<?php while ( $query->have_posts() ) : $query->the_post();
						$pid        = get_the_ID();
						$permalink  = get_permalink( $pid );
						$title_text = get_the_title( $pid );
						if ( $title_limit !== '' && (int) $title_limit > 0 && mb_strlen( $title_text ) > (int) $title_limit ) {
							$title_text = mb_substr( $title_text, 0, (int) $title_limit ) . '…';
						}
						?>
						<article class="caw-pg-item" style="<?php echo esc_attr( $card_istyle ); ?>">

							<?php if ( $show_image === 'yes' && has_post_thumbnail( $pid ) ) :
								$thumb_html = get_the_post_thumbnail( $pid, $image_size, array( 'class' => 'caw-pg-thumb', 'loading' => 'lazy' ) );
								?>
								<div class="caw-pg-image" style="<?php echo esc_attr( $img_istyle ); ?>">
									<?php if ( $link_image === 'yes' ) : ?>
										<a href="<?php echo esc_url( $permalink ); ?>"
											target="<?php echo esc_attr( $open_target ); ?>"
											<?php if ( $open_rel !== '' ) : ?>rel="<?php echo esc_attr( $open_rel ); ?>"<?php endif; ?>
											aria-label="<?php echo esc_attr( $title_text ); ?>">
											<?php echo wp_kses_post( $thumb_html ); ?>
										</a>
									<?php else : ?>
										<?php echo wp_kses_post( $thumb_html ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<div class="caw-pg-body">
								<?php if ( $show_meta === 'yes' ) :
									$meta_parts = array();

									if ( $meta_author === 'yes' ) {
										$author_id   = get_the_author_meta( 'ID' );
										$author_name = get_the_author();
										$author_url  = get_author_posts_url( $author_id );
										$meta_parts[] = '<span class="caw-pg-meta-item caw-pg-meta-author"><a href="' . esc_url( $author_url ) . '">' . esc_html( $author_name ) . '</a></span>';
									}
									if ( $meta_date === 'yes' ) {
										$meta_parts[] = '<span class="caw-pg-meta-item caw-pg-meta-date">' . esc_html( get_the_date() ) . '</span>';
									}
									if ( $meta_category === 'yes' ) {
										$tax_for_meta = 'category';
										if ( $taxonomy !== '' && taxonomy_exists( $taxonomy ) ) {
											$tax_for_meta = $taxonomy;
										}
										if ( taxonomy_exists( $tax_for_meta ) ) {
											$terms_for_post = get_the_terms( $pid, $tax_for_meta );
											if ( is_array( $terms_for_post ) && ! empty( $terms_for_post ) ) {
												$term_links = array();
												foreach ( $terms_for_post as $term ) {
													$tlink = get_term_link( $term );
													if ( ! is_wp_error( $tlink ) ) {
														$term_links[] = '<a href="' . esc_url( $tlink ) . '">' . esc_html( $term->name ) . '</a>';
													}
												}
												if ( ! empty( $term_links ) ) {
													$meta_parts[] = '<span class="caw-pg-meta-item caw-pg-meta-cat">' . implode( ', ', $term_links ) . '</span>';
												}
											}
										}
									}
									if ( $meta_comments === 'yes' ) {
										$cc = (int) get_comments_number( $pid );
										/* translators: %d: number of comments */
										$meta_parts[] = '<span class="caw-pg-meta-item caw-pg-meta-comments">' . esc_html( sprintf( _n( '%d comment', '%d comments', $cc, 'classic-addons-wpbakery-page-builder' ), $cc ) ) . '</span>';
									}

									if ( ! empty( $meta_parts ) ) :
										// Each $meta_parts entry is already individually escaped above. ?>
										<div class="caw-pg-meta" style="<?php echo esc_attr( $meta_istyle ); ?>">
											<?php echo wp_kses(
												implode( ' ', $meta_parts ),
												array(
													'span' => array( 'class' => true ),
													'a'    => array( 'href' => true ),
												)
											); ?>
										</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if ( $show_title === 'yes' && $title_text !== '' ) : ?>
									<<?php echo esc_html( $title_tag ); ?> class="caw-pg-title" style="<?php echo esc_attr( $title_istyle ); ?>">
										<?php if ( $link_title === 'yes' ) : ?>
											<a href="<?php echo esc_url( $permalink ); ?>"
												target="<?php echo esc_attr( $open_target ); ?>"
												<?php if ( $open_rel !== '' ) : ?>rel="<?php echo esc_attr( $open_rel ); ?>"<?php endif; ?>><?php echo esc_html( $title_text ); ?></a>
										<?php else : ?>
											<?php echo esc_html( $title_text ); ?>
										<?php endif; ?>
									</<?php echo esc_html( $title_tag ); ?>>
								<?php endif; ?>

								<?php if ( $show_excerpt === 'yes' ) :
									$excerpt_text = has_excerpt( $pid ) ? get_the_excerpt( $pid ) : wp_strip_all_tags( get_the_content( null, false, $pid ) );
									$limit = (int) $excerpt_limit;
									if ( $limit > 0 ) {
										if ( $excerpt_unit === 'chars' ) {
											if ( mb_strlen( $excerpt_text ) > $limit ) {
												$excerpt_text = mb_substr( $excerpt_text, 0, $limit ) . '…';
											}
										} else {
											$excerpt_text = wp_trim_words( $excerpt_text, $limit, '…' );
										}
									}
									if ( $excerpt_text !== '' ) : ?>
										<div class="caw-pg-excerpt" style="<?php echo esc_attr( $excerpt_istyle ); ?>"><?php echo esc_html( $excerpt_text ); ?></div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if ( $show_readmore === 'yes' && $readmore_text !== '' ) : ?>
									<a class="caw-pg-readmore"
										href="<?php echo esc_url( $permalink ); ?>"
										target="<?php echo esc_attr( $open_target ); ?>"
										<?php if ( $open_rel !== '' ) : ?>rel="<?php echo esc_attr( $open_rel ); ?>"<?php endif; ?>
										style="<?php echo esc_attr( $btn_istyle ); ?>"
										data-hover-bg="<?php echo esc_attr( $btn_bg_hover ); ?>"
										data-hover-color="<?php echo esc_attr( $btn_color_hover ); ?>">
										<?php echo esc_html( $readmore_text ); ?>
									</a>
								<?php endif; ?>
							</div>

						</article>
					<?php endwhile; ?>
				</div>

				<?php
				$max_pages   = max( 1, (int) $query->max_num_pages );
				$current_pg  = $paged;

				if ( $pagination === 'numbered' && $max_pages > 1 ) :
					$page_links = array();
					for ( $p = 1; $p <= $max_pages; $p++ ) {
						$url = esc_url( add_query_arg( $page_qkey, $p ) );
						$cls = ( $p === $current_pg ) ? 'caw-pg-page is-current' : 'caw-pg-page';
						$page_links[] = '<a class="' . esc_attr( $cls ) . '" href="' . $url . '">' . esc_html( $p ) . '</a>';
					}
					?>
					<nav class="caw-pg-pagination" role="navigation" aria-label="<?php echo esc_attr__( 'Posts pagination', 'classic-addons-wpbakery-page-builder' ); ?>">
						<?php echo wp_kses(
							implode( '', $page_links ),
							array( 'a' => array( 'href' => true, 'class' => true ) )
						); ?>
					</nav>
				<?php elseif ( $pagination === 'loadmore' && $max_pages > 1 ) : ?>
					<div class="caw-pg-loadmore-wrap" data-current="1" data-max="<?php echo esc_attr( $max_pages ); ?>">
						<button type="button"
							class="caw-pg-loadmore"
							style="<?php echo esc_attr( $btn_istyle ); ?>"
							data-hover-bg="<?php echo esc_attr( $btn_bg_hover ); ?>"
							data-hover-color="<?php echo esc_attr( $btn_color_hover ); ?>"
							disabled
							aria-disabled="true"
							title="<?php echo esc_attr__( 'Load More requires AJAX (planned for a future release).', 'classic-addons-wpbakery-page-builder' ); ?>">
							<?php echo esc_html( $loadmore_text ); ?>
						</button>
					</div>
				<?php endif; ?>

			<?php endif; ?>
		</div>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
	}

	/**
	 * Build a sanitized WP_Query args array from the shortcode atts.
	 */
	private function build_query_args( $atts, $paged ) {

		$args = array(
			'post_status'   => 'publish',
			'no_found_rows' => $atts['pagination'] === 'none',
		);

		// Post type.
		if ( $atts['post_type'] === 'any' ) {
			$args['post_type'] = 'any';
		} else {
			$pt = sanitize_key( $atts['post_type'] );
			if ( post_type_exists( $pt ) ) {
				$args['post_type'] = $pt;
			} else {
				$args['post_type'] = 'post';
			}
		}

		// Posts per page / paged.
		$ppp = max( 1, (int) $atts['posts_per_page'] );
		$args['posts_per_page'] = $ppp;
		$args['paged']          = max( 1, (int) $paged );

		// Offset (note: WP_Query ignores offset when paged is set, so apply
		// it as a manual offset only on the first page).
		$offset = (int) $atts['offset'];
		if ( $offset > 0 && (int) $paged === 1 ) {
			$args['offset'] = $offset;
		}

		// Order.
		$allowed_orderby = array( 'date', 'title', 'modified', 'rand', 'menu_order', 'comment_count' );
		$args['orderby'] = in_array( $atts['orderby'], $allowed_orderby, true ) ? $atts['orderby'] : 'date';
		$args['order']   = strtoupper( $atts['order'] ) === 'ASC' ? 'ASC' : 'DESC';

		// Sticky.
		if ( $atts['ignore_sticky'] === 'yes' ) {
			$args['ignore_sticky_posts'] = true;
		}

		// Author filter.
		if ( $atts['authors'] !== '' ) {
			$ids = array_filter( array_map( 'intval', explode( ',', $atts['authors'] ) ) );
			if ( ! empty( $ids ) ) {
				$args['author__in'] = $ids;
			}
		}

		// Taxonomy filter.
		if ( $atts['taxonomy'] !== '' && $atts['terms'] !== '' ) {
			$tax = sanitize_key( $atts['taxonomy'] );
			if ( taxonomy_exists( $tax ) ) {
				$term_slugs = array_filter( array_map( 'sanitize_title', array_map( 'trim', explode( ',', $atts['terms'] ) ) ) );
				if ( ! empty( $term_slugs ) ) {
					$args['tax_query'] = array(
						array(
							'taxonomy' => $tax,
							'field'    => 'slug',
							'terms'    => $term_slugs,
						),
					);
				}
			}
		}

		// Exclude current post.
		if ( $atts['exclude_current'] === 'yes' && is_singular() ) {
			$current = get_queried_object_id();
			if ( $current ) {
				$args['post__not_in'] = array( (int) $current );
			}
		}

		return $args;
	}
}
