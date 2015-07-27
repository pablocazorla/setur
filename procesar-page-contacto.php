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



    
    //proceed with PHP email.
    //$to_email = "pablo.david.cazorla@gmail.com";//"gdavies@dixitestudio.com"; 
    $to_email = "gdavies@dixitestudio.com"; 
    $subject = "Contacto - Setur";


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
                        Contacto desde el sitio - Setur
                      </div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Nombre y Apellido:</strong> ' . $_POST['nombre'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Localidad:</strong> ' . $_POST['localidad'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Provincia:</strong> ' . $_POST['provincia'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Teléfono:</strong> ' . $_POST['telefono'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Email:</strong> <a href="mailto:'.$_POST['email'].'">' . $_POST['email'] . '</a>
                      </div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Cantidad de personas:</strong> ' . $_POST['numPersonas'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Presupuesto limitado:</strong> ' . $_POST['limitado'] .
                      '</div>
                      <div style="padding:0;margin:0 0 5px;">
                        <strong>Consulta:</strong> ' . $_POST['consulta'] .
                      '</div>
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
    
    $headers = "From: Contacto\r\nReply-To: ".$_POST['email']."\r\nContent-type: text/html\r\n";
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
    if(!$send_mail)    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }    
}
?>