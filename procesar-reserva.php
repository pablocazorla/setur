<?php
	if($_POST){
		

		//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 


    $pasajeros = $_POST['pasajeros'];

    $pasajeros_length = count($pasajeros);

    $pasajeros_table = '<table cellspacing="0" cellpadding="0" border="0" align="left" bgcolor="#FFFFFF" style="margin:0;font-size:12px;min-width:400px"><thead bgcolor="#EEEEEE"><tr><th style="padding:5px 10px;text-align:left">Nombre</th><th style="padding:5px 10px;text-align:left">Apellido</th><th style="padding:5px 10px;text-align:left">Documento</th><th style="padding:5px 10px;text-align:left">Número</th></tr></thead><tbody>';

    for($i = 0;$i<$pasajeros_length;$i++){
    	$pasajeros_table .= '<tr><td style="padding:5px 10px;border-bottom:1px solid #DDD;">';
    	$pasajeros_table .= $pasajeros['pasajero'.$i]['nombre'];
    	$pasajeros_table .= '</td><td style="padding:5px 10px;border-bottom:1px solid #DDD;">';
    	$pasajeros_table .= $pasajeros['pasajero'.$i]['apellido'];
    	$pasajeros_table .= '</td><td style="padding:5px 10px;border-bottom:1px solid #DDD;">';
      $pasajeros_table .= $pasajeros['pasajero'.$i]['doc'];
      $pasajeros_table .= '</td><td style="padding:5px 10px;border-bottom:1px solid #DDD;">';
    	$pasajeros_table .= $pasajeros['pasajero'.$i]['dni'];
    	$pasajeros_table .= '</td><tr>';
    }

    $pasajeros_table .= '</tbody></table>';


    
    //proceed with PHP email.
   // $to_email = "pablo.david.cazorla@gmail.com";//"gdavies@dixitestudio.com"; 
    $to_email = "gdavies@dixitestudio.com"; 
    $subject = "Solicitud de reserva - Setur";


$message_body = '<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%!important;table-layout:fixed;" bgcolor="#F2F2F2">
  <tbody>
    <tr>
      <td>
        <table cellspacing="0" cellpadding="0" border="0" style="width:700px;margin:30px auto;border:solid 1px #DDD;border-radius:2px;" bgcolor="#FFFFFF" align="center">
          <tbody>            
            <tr>
              <td>
                <table cellspacing="0" cellpadding="0" border="0" align="left" bgcolor="#FFFFFF" style="border-collapse:collapse;width:100%!important;table-layout:fixed;font-family:tahoma,verdana,arial,sans-serif;font-size:12px;line-height:20px;text-align:left;color:#444444;">
                  <tr>
                    <td style="padding:20px;">
                      <div style="margin:0 0 20px;font-size:18px;color:#222222;border-bottom:solid 1px #DDDDDD;padding:0 0 20px;">
                        Solicitud de reserva - Setur
                      </div>
                      <div style="padding:0;margin:0 0 20px;">'
                        . $_POST['comentarioAdicional'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Destino: </strong> ' . $_POST['destino'] . '
                      </div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Hotel: </strong> <a href="'. $_POST['hotelLink'] . '">' . $_POST['hotel'] . '</a>
                      </div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>E-mail: </strong> <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a>
                      </div>
                      <div style="padding:0;margin:0 0 25px;">
                        <strong>CUIT/CUIL: </strong> ' . $_POST['cuil'] . '
                      </div>
                      <div style="padding:0;margin:0 0 4px;">
                        <strong>Pasajeros: </strong>
                      </div>
                      ' . $pasajeros_table . '
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>';
    
    $headers = "From: Reservas\r\nReply-To: ".$_POST['email']."\r\nContent-type: text/html\r\n";
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
   /* if(!$send_mail)    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }    */
}
?>