<?php
/**
 * Template part for displaying static form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dentalika
 */

?>
<div class="static-form mt-50-30">
	<div class="row">
		<div class="col-12">
			<div class="form-info">
				<div class="form-info__title"><?php the_field('messangers-sign-title', 8); ?></div>
				<div class="form-info__subtitle"><?php the_field('messangers-sign-subtitle', 8); ?></div>
				<button class="static-form__btn btn-5 sign-btn" type="submit"><?php the_field('messangers-sign-btn-text', 8); ?></button>
			</div>
		</div>
	</div>
</div>
