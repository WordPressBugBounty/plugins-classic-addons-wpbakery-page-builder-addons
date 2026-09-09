<?php
/**
 * Classic Addons - Settings Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$cawpb_addons       = cawpb_get_addon_info();
$cawpb_get_settings = get_option( 'caw_settings' );
if ( ! is_array( $cawpb_get_settings ) ) { $cawpb_get_settings = array(); }

$cawpb_total_count   = count( $cawpb_addons );
$cawpb_enabled_count = 0;
foreach ( $cawpb_addons as $cawpb_slug => $cawpb_meta ) {
	if ( isset( $cawpb_get_settings[ $cawpb_slug ] ) && $cawpb_get_settings[ $cawpb_slug ] === 'on' ) {
		$cawpb_enabled_count++;
	}
}

// SVG allow-list used for inline fallback icons and the check badge.
$cawpb_svg_allow = array(
	'svg'    => array( 'viewbox' => true, 'xmlns' => true, 'fill' => true, 'aria-hidden' => true, 'width' => true, 'height' => true ),
	'circle' => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ),
	'rect'   => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ),
	'path'   => array( 'd' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true ),
	'g'      => array( 'fill' => true, 'stroke' => true ),
);
?>
<div class="caw-settings-page">

	<div class="caw-settings-hero">
		<div class="caw-hero-left">
			<div class="caw-hero-logo" aria-hidden="true">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6.5l8-4 8 4v11l-8 4-8-4v-11z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M12 12l8-4M12 12v9M12 12L4 8" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
			</div>
			<div>
				<h1 class="caw-hero-title"><?php esc_html_e( 'Classic Addons', 'classic-addons-wpbakery-page-builder' ); ?></h1>
				<p class="caw-hero-sub">
					<?php
					/* translators: %s: plugin version */
					echo esc_html( sprintf( __( 'Manage your addons. Version %s', 'classic-addons-wpbakery-page-builder' ), defined( 'CAWPB_VERSION' ) ? CAWPB_VERSION : '' ) );
					?>
				</p>
			</div>
		</div>
		<div class="caw-hero-stats">
			<div class="caw-stat">
				<span class="caw-stat-value caw-js-enabled-count"><?php echo (int) $cawpb_enabled_count; ?></span>
				<span class="caw-stat-label"><?php esc_html_e( 'Enabled', 'classic-addons-wpbakery-page-builder' ); ?></span>
			</div>
			<div class="caw-stat caw-stat-muted">
				<span class="caw-stat-value"><?php echo (int) $cawpb_total_count; ?></span>
				<span class="caw-stat-label"><?php esc_html_e( 'Total', 'classic-addons-wpbakery-page-builder' ); ?></span>
			</div>
		</div>
	</div>

	<?php
	// Upgrade banner — only when the Pro companion is not active.
	$cawpb_show_upgrade = ! function_exists( 'cawpb_is_pro' ) || ! cawpb_is_pro();
	if ( $cawpb_show_upgrade ) :
		$cawpb_pricing_url = 'https://classicaddons.com/pricing/?utm_source=free-plugin&utm_medium=settings-banner&utm_campaign=upgrade';
		$cawpb_features_url = 'https://classicaddons.com/pro/?utm_source=free-plugin&utm_medium=settings-banner&utm_campaign=upgrade';
		?>
		<div class="caw-pro-banner" role="complementary" aria-label="<?php esc_attr_e( 'Upgrade to Classic Addons Pro', 'classic-addons-wpbakery-page-builder' ); ?>">
			<div class="caw-pro-banner-glow" aria-hidden="true"></div>
			<div class="caw-pro-banner-main">
				<span class="caw-pro-badge"><?php esc_html_e( 'PRO', 'classic-addons-wpbakery-page-builder' ); ?></span>
				<h2 class="caw-pro-banner-title"><?php esc_html_e( 'Do more with Classic Addons Pro', 'classic-addons-wpbakery-page-builder' ); ?></h2>
				<p class="caw-pro-banner-text">
					<?php esc_html_e( 'Unlock 20+ premium widgets: Modal, Off-Canvas, Charts, Filterable Gallery, Timeline, Table of Contents and more, plus Tooltip, Display Conditions and Sticky extensions for every element.', 'classic-addons-wpbakery-page-builder' ); ?>
				</p>
				<ul class="caw-pro-feats" aria-hidden="true">
					<li><?php esc_html_e( '20+ Pro widgets', 'classic-addons-wpbakery-page-builder' ); ?></li>
					<li><?php esc_html_e( 'Global extensions', 'classic-addons-wpbakery-page-builder' ); ?></li>
					<li><?php esc_html_e( 'SEO heading &amp; alt controls', 'classic-addons-wpbakery-page-builder' ); ?></li>
					<li><?php esc_html_e( 'Lifetime updates', 'classic-addons-wpbakery-page-builder' ); ?></li>
				</ul>
			</div>
			<div class="caw-pro-banner-cta">
				<a class="caw-pro-btn" href="<?php echo esc_url( $cawpb_pricing_url ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Upgrade to Pro', 'classic-addons-wpbakery-page-builder' ); ?>
				</a>
				<a class="caw-pro-cta-link" href="<?php echo esc_url( $cawpb_features_url ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'See all features →', 'classic-addons-wpbakery-page-builder' ); ?>
				</a>
			</div>
		</div>
	<?php endif; ?>

	<form class="caw-settings-form" autocomplete="off">
		<input type="hidden" name="action" value="caw_settings_action">
		<?php wp_nonce_field( 'cawp_admin_settings', 'cawp_admin_settings_nonce' ); ?>

		<div class="caw-settings-toolbar">
			<div class="caw-toolbar-search">
				<svg class="caw-search-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
				<input type="search" class="caw-search-input" placeholder="<?php esc_attr_e( 'Search addons…', 'classic-addons-wpbakery-page-builder' ); ?>" aria-label="<?php esc_attr_e( 'Search addons', 'classic-addons-wpbakery-page-builder' ); ?>">
			</div>
			<div class="caw-toolbar-actions">
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="enable"><?php esc_html_e( 'Enable All', 'classic-addons-wpbakery-page-builder' ); ?></button>
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="disable"><?php esc_html_e( 'Disable All', 'classic-addons-wpbakery-page-builder' ); ?></button>
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="reset"><?php esc_html_e( 'Reset', 'classic-addons-wpbakery-page-builder' ); ?></button>
			</div>
		</div>

		<div class="caw-cards-grid">
			<?php foreach ( $cawpb_addons as $cawpb_slug => $cawpb_meta ) :
				$cawpb_name        = isset( $cawpb_meta['name'] ) ? $cawpb_meta['name'] : '';
				$cawpb_description = isset( $cawpb_meta['description'] ) ? $cawpb_meta['description'] : '';
				$cawpb_is_enabled  = isset( $cawpb_get_settings[ $cawpb_slug ] ) && $cawpb_get_settings[ $cawpb_slug ] === 'on';
				$cawpb_icon_url    = cawpb_get_addon_icon_url( $cawpb_slug );
				?>
				<label class="caw-card <?php echo $cawpb_is_enabled ? 'is-enabled' : ''; ?>"
					data-slug="<?php echo esc_attr( $cawpb_slug ); ?>"
					data-name="<?php echo esc_attr( $cawpb_name ); ?>"
					data-initial="<?php echo $cawpb_is_enabled ? '1' : '0'; ?>">
					<input type="checkbox"
						class="caw-card-checkbox"
						name="caw_settings[<?php echo esc_attr( $cawpb_slug ); ?>]"
						value="on"
						<?php checked( $cawpb_is_enabled, true ); ?>>

					<span class="caw-card-check" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12.5l4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</span>

					<span class="caw-card-icon" aria-hidden="true">
						<?php if ( $cawpb_icon_url !== '' ) : ?>
							<img src="<?php echo esc_url( $cawpb_icon_url ); ?>" alt="">
						<?php else : ?>
							<span class="caw-card-icon-svg"><?php echo wp_kses( cawpb_get_addon_fallback_svg( $cawpb_slug ), $cawpb_svg_allow ); ?></span>
						<?php endif; ?>
					</span>

					<span class="caw-card-body">
						<span class="caw-card-title"><?php echo esc_html( $cawpb_name ); ?></span>
						<?php if ( $cawpb_description !== '' ) : ?>
							<span class="caw-card-desc"><?php echo esc_html( $cawpb_description ); ?></span>
						<?php endif; ?>
					</span>

					<span class="caw-card-toggle" aria-hidden="true">
						<span class="caw-toggle-track">
							<span class="caw-toggle-thumb"></span>
						</span>
					</span>

					<span class="caw-card-status">
						<span class="caw-status-on"><?php esc_html_e( 'Enabled', 'classic-addons-wpbakery-page-builder' ); ?></span>
						<span class="caw-status-off"><?php esc_html_e( 'Disabled', 'classic-addons-wpbakery-page-builder' ); ?></span>
					</span>
				</label>
			<?php endforeach; ?>
		</div>

		<div class="caw-no-results" hidden>
			<?php esc_html_e( 'No addons match your search.', 'classic-addons-wpbakery-page-builder' ); ?>
		</div>

		<div class="caw-save-bar caw-js-save-bar" aria-live="polite">
			<div class="caw-save-info">
				<span class="caw-save-dot" aria-hidden="true"></span>
				<span class="caw-save-text"><?php esc_html_e( 'You have unsaved changes.', 'classic-addons-wpbakery-page-builder' ); ?></span>
			</div>
			<div class="caw-save-actions">
				<button type="button" class="caw-btn caw-btn-ghost caw-js-discard"><?php esc_html_e( 'Discard', 'classic-addons-wpbakery-page-builder' ); ?></button>
				<button type="submit" class="caw-btn caw-btn-primary">
					<span class="caw-btn-label"><?php esc_html_e( 'Save Changes', 'classic-addons-wpbakery-page-builder' ); ?></span>
					<span class="caw-btn-spinner" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</form>

	<div class="caw-toast" role="status" aria-live="polite" hidden>
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
		<span class="caw-toast-text"><?php esc_html_e( 'Settings saved successfully.', 'classic-addons-wpbakery-page-builder' ); ?></span>
	</div>
</div>
