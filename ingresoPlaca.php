<!DOCTYPE html>
<?php
     
	error_reporting(E_ALL);
	ini_set("display_errors","on");
require_once( "recaptcha/autoload.php" );
	
			//print_r( $gtP);  
			
				if(isset($_POST['g-recaptcha-response']))
				{  
				
				$secret="6LczyvcSAAAAAChadvagjjwPC95PE7_B4_2wu-9g";

				$recaptcha = new \ReCaptcha\ReCaptcha($secret);

				$remoteIP=(isset($_SERVER["HTTP_X_FORWARDED_FOR"])?$_SERVER["HTTP_X_FORWARDED_FOR"]:$_SERVER["REMOTE_ADDR"]);
				//echo $remoteIP;
				//echo "<br>".$_POST['g-recaptcha-response'];

				 $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $remoteIP);
					if ($resp->isSuccess())
					{
						$email 	= $_POST["email"];
						$pass 	= $_POST["pass"];
						
					}
					else
					{?>
						<script languaje="JavaScript">
						
					    	//alert( 'Debes responder la pregunta.' );
									
						</script>
						<?php
						
					}
				}
				
			if(isset($_POST['placa']))
			{  
				$band=0;
				$placa = $_POST['placa'];
				$placa = explode('-',$placa);
				
				
				if(isset($placa[0]))
				{
				$letras=strlen($placa[0]);
						if ($letras != 3)
						{  $band=0;
						?>
						<script languaje="JavaScript">
						
					    	alert( 'Debes ingresar las 3 letras.' );
									
						</script>
						<?php
						}else{$band=1;}
				}
				
				if(isset($placa[1]))
				{
				$numeros=strlen($placa[1]);
				//echo $letras."--".$numeros;
				
					if ($numeros != 4)
					{  $band=0;
					       ?>
							<script languaje="JavaScript">
							
								alert( 'Debes ingresar los 4 digitos.' );
										
							</script>
							<?php
					}else{
					      $band=1;
					     if(isset($_POST['fecha']))
							{
								$fecha = explode(' ',$_POST['fecha']);
								
								
								if(isset($fecha[0]))
								{
									$fechaDia=strlen($fecha[0]);
										if ($fechaDia != 10)
										{ $band=0;
											?>
											<script languaje="JavaScript">
											
												alert( 'Debes ingresar correctamente la fecha.' );
														
											</script>
											<?php
										}else{$band=1;}
								}
										
									if(isset($fecha[1]))
									{ 
										$hora=strlen($fecha[1]);
										//echo $letras."--".$numeros;
										
											if ($hora != 8)
											{ $band=0;
												 ?>
													<script languaje="JavaScript">
													
														alert( 'Debes ingresar correctamente la hora.' );
																
													</script>
													<?php
											}else{$band=1;}
									}
										
									if($band==1)
									{
										?>
										<script languaje="JavaScript">
										
											alert( 'Este carro puede estar en la carretera.' );
													
										</script>
										<?php
									}
							   }
					
					    }
				}
						
			
		    }
			
			
?>
<html class="no-js">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Claro Play</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="css/styles.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
  
    <div class="cp-table">
      <div class="cp-container">
        <div class="cp-login">
          <div class="cp-login-container">
            <form action="login.php" method="POST">
           <p class="cp-text">Por favor ingresa a tu numero de <strong>Placa</strong></p>
            
              <div class="cp-form-element">
                <p>
                  <input type="text" name="placa" id="placa" placeholder="AAA-0000" class="input-text" maxlength="8">
                </p>
              </div>
			  <p class="cp-text">Por favor ingresa la <strong>Fecha</strong></p>
			   <div class="cp-form-element">
                <p>
                  <input type="text" name="fecha" id="fecha" placeholder="dd/mm/yyyy h24/mi/ss" class="input-text" maxlength="19">
                </p>
              </div>
              <div class="cp-form-element">
                <p>
                  <input type="checkbox" name="remember" class="input-checkbox"><span>Recordar Placa</span><span class="error">Mensaje de error</span>
                </p>
              </div>
              <div class="cp-form-element">
                <div class="g-recaptcha" data-sitekey="6LczyvcSAAAAACEtlLuiPMJV_MXf9ydsTHKkpsJP"></div>
              </div>
              <div class="cp-form-element">
                <p>
                  <input type="submit" name="send" value="Ingresar" class="input-submit"><a href="#" class="link-cancel"><i></i>Cancelar</a>
                </p>
              </div>
           </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>