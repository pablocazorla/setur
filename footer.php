		<footer id="main-footer">
			<div class="wrap">
				<div class="row">
					<div class="col-3">
						<h3>Contáctanos aquí</h3>
						<div id="contact-form-footer">
							<?php include 'contact-form.php';?>
						</div>												
					</div>
					<div class="col-3">
						<h3>Ubicación</h3>
						<div class="gmap-container">
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.932904197134!2d-58.38311605186573!3d-34.608656899908205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacf19459af7%3A0xf8e533bc9e4a4c27!2s9+de+Julio!5e0!3m2!1ses!2sar!4v1436794048306" width="300" height="202" frameborder="0" style="border:0" allowfullscreen></iframe>
							<!---->
						</div>
						<p>Charles de Gaulle 432 c/Dr. Hasler</p>
						<p>595 21 622912 // 609 680</p>
						<p><a href="mailto:info@setur.com.py" target="_blank">info@setur.com.py</a></p>
					</div>
					<div class="col-6">
						<div class="footer-img-container">
							<img src="<?php bloginfo('template_url'); ?>/img/footer-img.png" class="responsive">
							<nav class="nav-social">
								<a href="https://www.facebook.com/pages/Setur-Servicio-Especializado-en-Turismo/286503121419297" title="Facebook" target="_blank" class="ns-facebook">Facebook</a>
								<a href="https://twitter.com/setur_viajes" title="Twitter" class="ns-twitter" target="_blank">Twitter</a>
								<a href="" title="Instagram" class="ns-instagram">Instagram</a>
								<a href="" title="Youtube" class="ns-youtube">Youtube</a>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap-wide"><hr></div>
			<div class="wrap">
				<?php wp_nav_menu( array('theme_location' => 'main_footer','container' => false, 'menu_class' => 'menu-footer')); ?>	
			</div>
		</footer>
		<div class="wrap dixit-container">
			<a href="" class="dixit-link" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/dixit.png" width="138" width="28"></a>			
		</div>
		<?php wp_footer(); ?>
	</body>
</html>