<?php get_header();?>
<div class="banner">
	<?php 
		$args = array('post_type' => 'banners', 'posts_per_page' => 1, 'order' =>'asc', 'orderby' =>'menu_order');
		$loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post();

		$image = get_field('imagem_de_destaque');

	?>
		<div class="banner-full">
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-responsive full-bn zoom">
			<div class="banner-content">
				<div class="container">
					<div class="row">
						<?php the_field('chamada');?>
						<div class="buttons">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>contato/" title="" class="btn btn-red"><?php esc_html_e( 'Saiba Mais', 'ibrachina' ); ?></a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>contato/" title="" class="btn btn-red"><?php esc_html_e( 'Cadastre-se', 'ibrachina' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_query();?>
</div>

<?php get_template_part('parts/sobre');?>

<div class="porque">
	<?php $my_query = new WP_Query('page_id=69');
		while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID;

		$atleta = get_field('atleta');
	?>
		<div class="container">
			<div class="row">
				<h2>Ibrachina F.C</h2>

				<div class="pq-head">
					<span><?php esc_html_e( 'Porque o', 'ibrachina' ); ?> Ibrachina?</span>
					<?php the_content();?>
				</div>

				<div class="box-pq">
					<div class="box-itens">
						<?php if( have_rows('motivos') ): ?>
							<?php
								while( have_rows('motivos') ): the_row();
								$imageDestaque = get_sub_field('imagem_de_destaque');
							?>
								<div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<?php echo wp_get_attachment_image( $imageDestaque, 'full' ); ?>
									<h4><?php echo acf_esc_html( get_sub_field('titulo') ); ?></h4>
									<p><?php echo acf_esc_html( get_sub_field('conteudo') ); ?></p>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<img src="<?php bloginfo('template_directory');?>/images/atleta.png" alt="" class="atleta">
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_query();?>
</div>


<div class="futuro">
	<?php $my_query = new WP_Query('page_id=117');
		while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID;
	?>
		<div class="container">
			<div class="row">
				<?php the_content();?>

				<?php if( have_rows('futuro') ): ?>
					<?php
						while( have_rows('futuro') ): the_row();
						$imageDest = get_sub_field('imagem_de_destaque');
					?>
						<div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php echo wp_get_attachment_image( $imageDest, 'full', array ('class' => 'img-responsive' ) ); ?>
							<div class="box-futuro">
								<h3><?php echo acf_esc_html( get_sub_field('conteudo') ); ?></h3>
								<a href="<?php echo acf_esc_html( get_sub_field('url') ); ?>" class="btn btn-red"><?php echo acf_esc_html( get_sub_field('rotulo') ); ?></a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endwhile; wp_reset_query();?>
</div>


<div class="resultado">
	<div class="container">
		<div class="row">
			<?php $my_query = new WP_Query('page_id=22');
				while ($my_query->have_posts()) : $my_query->the_post();
				$do_not_duplicate = $post->ID;
			?>
				<?php if( have_rows('resultados') ): ?>
					<div class="placares owl-carousel owl-theme">
						<?php while( have_rows('resultados') ): the_row(); 
							?>
							<div class="item">
								<p><?php esc_html_e( 'Resultado do último jogo', 'ibrachina' ); ?> <?php echo acf_esc_html( get_sub_field('categoria') ); ?> - <?php echo acf_esc_html( get_sub_field('mandante') ); ?> <?php echo acf_esc_html( get_sub_field('placar_do_mandante') ); ?> x <?php echo acf_esc_html( get_sub_field('placar_do_visitante') ); ?> <?php echo acf_esc_html( get_sub_field('visitante') ); ?> </p>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			<?php endwhile; wp_reset_query();?>
		</div>
	</div>
</div>

<div class="patrocinadores">
	<div class="container">
		<div class="row">
			<?php $my_query = new WP_Query('page_id=34');
			  while ($my_query->have_posts()) : $my_query->the_post();
			  $do_not_duplicate = $post->ID;
			?>
				<h2><?php the_title();?></h2>
				<div class="patro-head">
					<span><?php esc_html_e( 'Conheça', 'ibrachina' ); ?></span>
					<?php the_content();?>
				</div>
				<?php if( have_rows('patrocinadores') ): ?>
						<?php  $i = 1; while( have_rows('patrocinadores') ): the_row();  $patro = get_sub_field('logotipo');?>
							<div class="item-patro <?php echo $i;?>">
								<a href="<?php echo esc_attr( get_sub_field('link_de_redirecionamento') ); ?>" target="_blank">
									<?php echo wp_get_attachment_image( $patro, 'full' ); ?>
								</a>
							</div>

							<?php if ($i == 4){
								break;
							}?>
							
						<?php $i = $i + 1; endwhile; ?>
				<?php endif; ?>
				<a href="<?php the_permalink();?>" class="btn btn-red"><?php esc_html_e( 'Faça Parte', 'ibrachina' ); ?></a>
			<?php endwhile; wp_reset_query();?>
		</div>
	</div>
</div>


<?php get_template_part('parts/insta');?>
<?php get_footer();?>