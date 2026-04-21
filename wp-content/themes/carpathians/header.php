<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adventuregamers
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen'); ?>>

<?php
$slogan = get_field( 'slogan', 'option' );
$socials = get_field( 'socials', 'option' );
?>

<header class="fixed lg:absolute w-full left-0 top-0 p-6 z-20 flex text-white">
	<div class="grid grid-cols-2 lg:grid-cols-6 gap-6 w-full">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php endif; ?>
	
		<?php if ( $slogan ) : ?>
			<div class="col-span-2 hidden lg:block">
				<div class="max-w-52 mr-auto font-tektur text-sm font-semibold">
					<?php echo esc_html( $slogan ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $socials ) : ?>
			<div class="col-span-2 hidden lg:flex gap-8">
				<?php foreach ( $socials as $social ) : ?>
					<a class="shrink-0 w-6 h-6 flex items-center justify-center [&_svg]:w-full [&_svg]:h-full [&_svg]:transition-colors [&_svg]:duration-200 hover:[&_svg]:fill-red" href="<?php echo esc_url( $social['link'] ); ?>" target="_blank" rel="noopener noreferrer">
						<!-- I know it is not super safe method, but for test project should be fine. -->
						<?php
						$svg = file_get_contents( get_attached_file( $social['icon']['ID'] ) );
						$svg = preg_replace( '/\sfill="[^"]*"/', '', $svg );
						$svg = preg_replace( '/<svg/', '<svg fill="white"', $svg );
						echo $svg;
						?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="ml-auto hidden lg:flex font-firs-neue font-bold text-xs uppercase leading-tight self-start">
			<div class="px-2.75 py-1.5 bg-white text-black transition-colors cursor-pointer">
				УКР
			</div>
			<div class="px-2.75 py-1.5 text-white hover:bg-white hover:text-black transition-colors cursor-pointer">
				ENG
			</div>
		</div>

		<div class="ml-auto w-12 h-12 p-2 lg:hidden flex items-center justify-center cursor-pointer bg-red">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect y="2" width="32" height="4" fill="white"/>
				<rect x="8" y="14" width="16" height="4" fill="white"/>
				<rect y="26" width="32" height="4" fill="white"/>
			</svg>
		</div>
	</div>
</header>

<main>