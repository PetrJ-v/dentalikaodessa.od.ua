<div class="pagination-wrapper" id="pagination-wrapper">
	<?php
		$args = array(
			'prev_text'    => '<svg class="pagination__btn" width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g opacity="0.6">
					<path d="M0.410149 6.12281L6.75246 11.3358V0.0839844L0.410149 6.12281Z" fill="#3AADA7"/>
					<path d="M29.7613 4.253H5.27323V7.16609H29.7613V4.253Z" fill="#3AADA7"/>
					</g>
				</svg>
			',
			'next_text'    => '<svg class="pagination__btn" width="31" height="12" viewBox="0 0 31 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M30.3488 6.12281L24.0065 11.3358V0.0839844L30.3488 6.12281Z" fill="#3AADA7"/>
					<path d="M0.99762 4.253H25.4857V7.16609H0.99762V4.253Z" fill="#3AADA7"/>
				</svg>
			',
		);
		the_posts_pagination($args);
	?>
</div>
