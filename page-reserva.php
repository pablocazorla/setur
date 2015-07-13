<?php
/*
 *  Template name: Reservas
 */

get_header();
$data = explode('#',base64_decode($_GET['id']));
?>
 
<h1><?php the_title();?></h1>
<p>Felicitaciones, esta completando los pasos para su reserva.</p>
<form id="form_reserva" action="<?php bloginfo('template_directory'); ?>/procesar-reserva.php" method="post">
							
Resumen de su reserva

Destino <?php echo $data[0]; ?><br />
Hotel <?php echo $data[1]; ?><br />

Comentario Adicional<br />
<textarea id="comentarios" name="comentarios"></textarea>
<br />
<input type="hidden" id="destino" name="destino" value="<?php echo $data[0]; ?>" />
<input type="hidden" id="destino" name="hotel" value="<?php echo $data[1]; ?>" />

							
<h5>Datos de Pasajeros</h5>
Nombre<br>
<input type="text" id="nombre" name="nombre" required /><br>
Apellido
<input type="text" id="apellido" name="apellido" required /><br>
DNI
<input type="text" id="dni" name="dni" required /><br>
<a href="#" id="agregar_pasajero">Agregar otro pasajero</a><br>

<input type="hidden" id="count" name="count" value="1" />								
<input type="hidden" id="medio_de_pago" name="medio_de_pago" value="No definido" />

<h5>Datos del Contacto</h5>
Email<br>
<input type="email" id="email" name="email" required /><br>
Confirme su email<br>
<input type="email" id="email2" name="email2" required /><br>
Cuil<br>
<input type="text" id="cuil" name="cuil" /><br>
<input type="submit" class="reservar submit" name="submit" value="CONFIRMAR RESERVA" />

</form>

<?php get_footer(); ?>