<form class="contact-form-common" action="<?php bloginfo('template_directory'); ?>/procesar-page-contacto.php">
	<fieldset class="fieldset-name">
		<input type="text" value="" placeholder="Nombre y Apellido" class="nameInput" data-validate="required"/>
	</fieldset>
	<fieldset class="fieldset-tel">
		<div class="fieldset-tel-col">
			<input type="text" value="" placeholder="Cel 0" class="tel1Input" data-validate="required,number"/>
		</div>
		<div class="fieldset-tel-col">
			<input type="text" value="" placeholder="15" class="tel2Input" data-validate="required,number"/>
		</div>
	</fieldset>
	<fieldset class="fieldset-email">
		<input type="email" value="" placeholder="E-mail" class="emailInput" data-validate="required,email"/>
	</fieldset>
	<fieldset class="fieldset-message">
		<textarea placeholder="Mensaje" class="messageInput" data-validate="required"></textarea>
	</fieldset>
	<input type="submit" class="submit-contact" value="CONSULTAR"/>
	<div class="success" style="display:none">Tu consulta ha sido enviada</div>
</form>