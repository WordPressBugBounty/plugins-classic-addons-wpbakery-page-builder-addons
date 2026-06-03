<?php
/**
 * Classic Addons - Settings Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$addons       = cawpb_get_addon_info();
$get_settings = get_option( 'caw_settings' );
if ( ! is_array( $get_settings ) ) { $get_settings = array(); }

$total_count   = count( $addons );
$enabled_count = 0;
foreach ( $addons as $slug => $meta ) {
	if ( isset( $get_settings[ $slug ] ) && $get_settings[ $slug ] === 'on' ) {
		$enabled_count++;
	}
}

// SVG allow-list used for inline fallback icons and the check badge.
$svg_allow = array(
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
				<h1 class="caw-hero-title"><?php esc_html_e( 'Classic Addons', 'classic-addons' ); ?></h1>
				<p class="caw-hero-sub">
					<?php
					/* translators: %s: plugin version */
					echo esc_html( sprintf( __( 'Manage your addons. Version %s', 'classic-addons' ), defined( 'CAWPB_VERSION' ) ? CAWPB_VERSION : '' ) );
					?>
				</p>
			</div>
		</div>
		<div class="caw-hero-stats">
			<div class="caw-stat">
				<span class="caw-stat-value caw-js-enabled-count"><?php echo (int) $enabled_count; ?></span>
				<span class="caw-stat-label"><?php esc_html_e( 'Enabled', 'classic-addons' ); ?></span>
			</div>
			<div class="caw-stat caw-stat-muted">
				<span class="caw-stat-value"><?php echo (int) $total_count; ?></span>
				<span class="caw-stat-label"><?php esc_html_e( 'Total', 'classic-addons' ); ?></span>
			</div>
		</div>
	</div>

	<form class="caw-settings-form" autocomplete="off">
		<input type="hidden" name="action" value="caw_settings_action">
		<?php wp_nonce_field( 'cawp_admin_settings', 'cawp_admin_settings_nonce' ); ?>

		<div class="caw-settings-toolbar">
			<div class="caw-toolbar-search">
				<svg class="caw-search-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
				<input type="search" class="caw-search-input" placeholder="<?php esc_attr_e( 'Search addons…', 'classic-addons' ); ?>" aria-label="<?php esc_attr_e( 'Search addons', 'classic-addons' ); ?>">
			</div>
			<div class="caw-toolbar-actions">
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="enable"><?php esc_html_e( 'Enable All', 'classic-addons' ); ?></button>
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="disable"><?php esc_html_e( 'Disable All', 'classic-addons' ); ?></button>
				<button type="button" class="caw-btn caw-btn-ghost caw-js-bulk" data-bulk="reset"><?php esc_html_e( 'Reset', 'classic-addons' ); ?></button>
			</div>
		</div>

		<div class="caw-cards-grid">
			<?php foreach ( $addons as $slug => $meta ) :
				$name        = isset( $meta['name'] ) ? $meta['name'] : '';
				$description = isset( $meta['description'] ) ? $meta['description'] : '';
				$is_enabled  = isset( $get_settings[ $slug ] ) && $get_settings[ $slug ] === 'on';
				$icon_url    = cawpb_get_addon_icon_url( $slug );
				?>
				<label class="caw-card <?php echo $is_enabled ? 'is-enabled' : ''; ?>"
					data-slug="<?php echo esc_attr( $slug ); ?>"
					data-name="<?php echo esc_attr( $name ); ?>"
					data-initial="<?php echo $is_enabled ? '1' : '0'; ?>">
					<input type="checkbox"
						class="caw-card-checkbox"
						name="caw_settings[<?php echo esc_attr( $slug ); ?>]"
						value="on"
						<?php checked( $is_enabled, true ); ?>>

					<span class="caw-card-check" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12.5l4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</span>

					<span class="caw-card-icon" aria-hidden="true">
						<?php if ( $icon_url !== '' ) : ?>
							<img src="<?php echo esc_url( $icon_url ); ?>" alt="">
						<?php else : ?>
							<span class="caw-card-icon-svg"><?php echo wp_kses( cawpb_get_addon_fallback_svg( $slug ), $svg_allow ); ?></span>
						<?php endif; ?>
					</span>

					<span class="caw-card-body">
						<span class="caw-card-title"><?php echo esc_html( $name ); ?></span>
						<?php if ( $description !== '' ) : ?>
							<span class="caw-card-desc"><?php echo esc_html( $description ); ?></span>
						<?php endif; ?>
					</span>

					<span class="caw-card-toggle" aria-hidden="true">
						<span class="caw-toggle-track">
							<span class="caw-toggle-thumb"></span>
						</span>
					</span>

					<span class="caw-card-status">
						<span class="caw-status-on"><?php esc_html_e( 'Enabled', 'classic-addons' ); ?></span>
						<span class="caw-status-off"><?php esc_html_e( 'Disabled', 'classic-addons' ); ?></span>
					</span>
				</label>
			<?php endforeach; ?>
		</div>

		<div class="caw-no-results" hidden>
			<?php esc_html_e( 'No addons match your search.', 'classic-addons' ); ?>
		</div>

		<div class="caw-save-bar caw-js-save-bar" aria-live="polite">
			<div class="caw-save-info">
				<span class="caw-save-dot" aria-hidden="true"></span>
				<span class="caw-save-text"><?php esc_html_e( 'You have unsaved changes.', 'classic-addons' ); ?></span>
			</div>
			<div class="caw-save-actions">
				<button type="button" class="caw-btn caw-btn-ghost caw-js-discard"><?php esc_html_e( 'Discard', 'classic-addons' ); ?></button>
				<button type="submit" class="caw-btn caw-btn-primary">
					<span class="caw-btn-label"><?php esc_html_e( 'Save Changes', 'classic-addons' ); ?></span>
					<span class="caw-btn-spinner" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</form>

	<div class="caw-toast" role="status" aria-live="polite" hidden>
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
		<span class="caw-toast-text"><?php esc_html_e( 'Settings saved successfully.', 'classic-addons' ); ?></span>
	</div>
</div>
