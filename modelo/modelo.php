<?php
function conectar_base_de_datos (){
    $conexion=mysqli_connect("localhost","root","","bolsa_empleo");
    if(!$conexion){
        echo 'No se pudo conectar con la jodida BD';
    }
    return $conexion;
}
function cerrar_conexion_db($conexion){
    mysqli_close($conexion);
}
function Register_New_Job_Action_Model(){
if($_SERVER['REQUEST_METHOD']=="POST"){
  
  if(isset($_SESSION['documento'])){
    echo "entre";
    $documento = $_SESSION['documento'];
    $vacante = $_POST['vacante'];
    $descripcion = $_POST['descripcion'];
    $descripcion_profesional = $_POST['descripcion_profesional'];
    $departamento = $_POST['departamento'];
    $ciudad=$_POST['ciudad'];
     $area=$_POST['area'];
      $horario=$_POST['horario'];
    $tiempo =$_POST['tiempo'];
    $conexion=conectar_base_de_datos();
    $fecha =  date("Y-m-d");
  $consulta = "INSERT INTO oferta (documento, area, vacante, horario, descripcion, descrip_prof, estado, tiempo, departamento, ciudad, fecha_publicacion) values ('$documento','$area','$vacante','$horario','$descripcion','$descripcion_profesional','A','$tiempo','$departamento','$ciudad','$fecha')";
    mysqli_query($conexion, $consulta);
     header("Location: /empleo/index.php/job_post?state=create");

  }

}else{
  header("Location: /empleo/index.php/404_error");
  }
}
function Exp_Lab_Person_Delete_Action_Model(){
if (isset($_GET['delete'])){
  if(isset( $_SESSION['documento'])){
    $id_exp = $_GET['delete'];
    $conexion=conectar_base_de_datos();
    $consulta = "DELETE FROM exp_laboral WHERE id_exp = '$id_exp'";
     $resultado=mysqli_query($conexion,$consulta);
     header("Location: /empleo/index.php/update_resume_person");
  }
}
}
function Studies_Person_Delete_Action_Model(){
if (isset($_GET['delete'])){
  if(isset( $_SESSION['documento'])){
    $id_est = $_GET['delete'];
    $conexion=conectar_base_de_datos();
    $consulta = "DELETE FROM estudios WHERE id_estudio = '$id_est'";
     $resultado=mysqli_query($conexion,$consulta);
     header("Location: /empleo/index.php/update_resume_person");
  }
}
}

function Get_Exp_Person_Action_Model(){
$conexion=conectar_base_de_datos();
$exp_laboral = array();
$documento = $_SESSION['documento'];
$consulta="SELECT id_exp, nombre_empresa, sector_empresa, cargo, fecha_ini, fecha_fin, logros FROM exp_laboral where documento ='$documento'";
        $resultado=mysqli_query($conexion,$consulta);
            while ($fila=mysqli_fetch_array($resultado)) {
$exp_laboral[]=$fila;
            }
            return $exp_laboral;
}
function Get_Estudies_Action_Model(){
$conexion=conectar_base_de_datos();
$estudies = array();
$documento = $_SESSION['documento'];
$consulta="SELECT * FROM estudios where documento ='$documento'";
$resultado=mysqli_query($conexion,$consulta);
while ($fila=mysqli_fetch_array($resultado)) {
  $estudies[]=$fila;
              }
return $estudies;
}

function Register_Exp_Job_Action_Model(){
if($_SERVER['REQUEST_METHOD']=="POST"){
  $conexion=conectar_base_de_datos();
  $nombre_empresa = ucwords($_POST['company_exp_name']);
  $cargo_empresa = ucwords($_POST['cargo']);
  $fecha_ini_trabajo = $_POST['fecha_ini_job'];
  $fecha_fin_trabajo = $_POST['fecha_fin_job'];
  $sector_empresa = $_POST['sector_empresa'];
  $logro = $_POST['logros'];
  $documento = $_SESSION['documento'];
  $consulta = "INSERT INTO exp_laboral (documento, nombre_empresa, sector_empresa, cargo, fecha_ini, fecha_fin, logros) values ('$documento','$nombre_empresa','$sector_empresa','$cargo_empresa','$fecha_ini_trabajo','$fecha_fin_trabajo','$logro')";
    mysqli_query($conexion, $consulta);
    header("Location: /empleo/index.php/update_resume_person");
}
}

function Register_Estudies_Action_Model(){
if($_SERVER['REQUEST_METHOD']=="POST"){
  $conexion=conectar_base_de_datos();
  $titulo = ucwords($_POST['title']);
  $nivel_estudio = $_POST['nivel_estudio'];
  $entidad = ucwords($_POST['entity']);
  $fecha_ini= $_POST['fecha_ini_stu'];
  $fecha_fin = $_POST['fecha_fin_stu'];
  $dpto = $_POST['departamento_study'];
  $mun = $_POST['municipio_study'];
  $documento = $_SESSION['documento'];
  $consulta = "INSERT INTO estudios (documento, title, nivel_estudio, centro_educativo, departamento, municipio, fecha_ini, fecha_fin) values ('$documento','$titulo','$nivel_estudio','$entidad','$dpto','$mun','$fecha_ini','$fecha_fin')";
    mysqli_query($conexion, $consulta);
    header("Location: /empleo/index.php/update_resume_person");
}
}
function Sender_Action_Model(){

$siteName = "www.pactamos.com";
if (isset($_POST['name']) &&($_POST['email']) ) {
  $subject = $_POST['subj'];
  $nombre=$_POST['name'];
  $email=$_POST['email']; 
  $obs=$_POST['mssg'];  

        $mailSub = '[Contacto] [' . $siteName . '] '.$subject;
  
  $Contenido="Esta persona quiere contactarle: 
  \nNombre: " .$nombre .  
  "\nEmail: " .$email . 
  "\nMensaje: " .$obs. " ";

  
        $header = 'From: ' . $mail . "\r\n";
  $header .= 'Reply-To:  ' . $mail . "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion(); 
  
  $to="nietoandres03@gmail.com";
  mail($to,$mailSub ,$Contenido, $header);  

}
else{
  echo "error";
}

header ('Location: ../index.php/contact'); 

}

function Verify_Account_Action_Model(){
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{

  $code = $_GET['code'];
   $conexion=conectar_base_de_datos();
   $consulta="SELECT documento FROM persona where activation_code ='$code' and verificado ='N'";
        $resultado=mysqli_query($conexion,$consulta);

              if(mysqli_num_rows($resultado) > 0)
{
$count=mysqli_query($conexion,"SELECT documento FROM persona WHERE activation_code='$code' and verificado ='N'");

if(mysqli_num_rows($count) == 1)
{
 
mysqli_query($conexion,"UPDATE persona SET verificado='Y' WHERE activation_code='$code'");
header("Location: /empleo/index.php/register_info?status=verified");
}
else
{
header("Location: /empleo/index.php/404_error");
}

}
else
{
$msg ="Wrong activation code.";

}
}else{
  header("Location: /empleo/index.php/404_error");
}}

 function Register_N_Action_Model(){
if($_SERVER['REQUEST_METHOD']=="POST"){
if(!empty($_POST['number']) && isset($_POST['name']) &&  !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_2']))
{
if($_POST['pass'] == $_POST['pass_2']){
  echo "entre aca<br>";
  echo $_POST['pass']." == ".$_POST['pass_2']."<br>";
  $email_natural = htmlentities($_POST['email']);
  $activation=md5($email_natural.time());
  $tipo_documento = htmlentities($_POST['type_document']);
  $documento = htmlentities($_POST['number']);
  $nombre_natural = htmlentities($_POST['name']);
  $apellido_natural = htmlentities($_POST['last_name']);
  $pass = htmlentities($_POST['pass']);
  $pass_2 = htmlentities($_POST['pass_2']);
  $passencript= sha1($pass);
  $conexion=conectar_base_de_datos();
 
  $consulta = "INSERT INTO persona (documento, tipo_documento, password, verificado, rol, activation_code) values ('$documento','$tipo_documento','$passencript','N','P','$activation')";
    mysqli_query($conexion, $consulta);
   $consulta = "INSERT INTO persona_natural (documento, nombre1, apellido1)VALUES('$documento','$nombre_natural','$apellido_natural')";
   mysqli_query($conexion, $consulta);
    $consulta = "INSERT INTO persona_correo (documento, correo)VALUES('$documento','$email_natural')";
    mysqli_query($conexion, $consulta);

  $siteName = "www.pactamos.com";
  $mailSub = '[Código de Verificación] [' . $siteName . '] ';
  $Contenido="Ingrese a este link Para Verificar su correo: www.pactamos.com/empleo/index.php/verify?code=$activation";
  $header = 'From: ' . $mail . "\r\n";
  $header .= 'Reply-To:  ' . $mail . "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();  
  mail($email_natural,$mailSub ,$Contenido, $header);  

//NIETO AQUI TIENE QUE ENVIAR UN EMAIL A $EMAIL_NATURAL CON EL SIGUIENTE LINK PACTAMOS.COM/EMPLEO/INDEX.PHP/VERIFY?CODE = $ACTIVATION
      header("Location: /empleo/index.php/register_info");
}else{
  header("Location: /empleo/index.php/404_error");
}
}else{
    header("Location: /empleo/index.php/404_error");
}
}else{
header("Location: /empleo/index.php/404_error");  
}}
function Register_E_Action_Model(){
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(!empty($_POST['number']) && isset($_POST['name_company']) &&  !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_2']))
{
if($_POST['pass'] == $_POST['pass_2']){
  $email_empresa = htmlentities($_POST['email']);
  $activation=md5($email_empresa.time());
  $tipo_documento = htmlentities($_POST['type_document']);
$documento = htmlentities($_POST['number']);
$nombre_empresa = htmlentities($_POST['name_company']);
$email_empresa = htmlentities($_POST['email']);
$pass = htmlentities($_POST['pass']);
$pass_2 = htmlentities($_POST['pass_2']);
$passencript= sha1($pass);
$conexion=conectar_base_de_datos();
$consulta = "INSERT INTO persona (documento, tipo_documento, password, verificado, rol, activation_code) values ('$documento','$tipo_documento','$passencript','N','E','$activation')";
  mysqli_query($conexion, $consulta);
$consulta = "INSERT INTO empresa (documento, nombre)VALUES('$documento','$nombre_empresa')";
 mysqli_query($conexion, $consulta);
$consulta = "INSERT INTO persona_correo (documento, correo)VALUES('$documento','$email_empresa')";
  mysqli_query($conexion, $consulta);

$siteName = "www.pactamos.com";
$mailSub = '[Código de Verificación] [' . $siteName . '] ';
$Contenido="Ingrese a este link Para Verificar su correo: www.pactamos.com/empleo/index.php/verify?code=$activation";
$header = 'From: ' . $siteName . "\r\n";
$header .= 'Reply-To:  ' . $siteName . "\r\n";
$header .= 'X-Mailer: PHP/' . phpversion();  
mail($email,$mailSub ,$Contenido, $header); 

    //NIETO AQUI TIENE QUE ENVIAR UN EMAIL A $EMAIL CON EL SIGUIENTE LINK PACTAMOS.COM/EMPLEO/INDEX.PHP/VERIFY?CODE = $ACTIVATION

header("Location: /empleo/index.php/resume");
}else{
   header("Location: /empleo/index.php/404_error");
}

}else{
    header("Location: /empleo/index.php/404_error");
}

}else{
header("Location: /empleo/index.php/404_error");  
}
}





function Loggin_Action_Model(){

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $conexion=conectar_base_de_datos();
        $documento=htmlentities($_POST['identificacion']);
        $documentofinal = mysql_escape_string($documento);
        $pass=htmlentities($_POST['password']);
        $tipo_documento = htmlentities($_POST['tipo_documento']);
        $claveCodificada = sha1($pass);
        $band=0;
        //echo $pass." -> ".$tipo_documento." -> ".$documento;
        
        $consulta="SELECT * FROM persona";
        $resultado=mysqli_query($conexion,$consulta);
            while ($fila=mysqli_fetch_array($resultado)) {
                $documentobase= $fila['documento'];
                $passbase = $fila['password'];
                $documento_base = $fila['tipo_documento'];

                if ($documentobase==$documentofinal && $passbase==$claveCodificada && $tipo_documento==$documento_base) {

                  
                $niveldeacceso = $fila['rol'];
                    
                    $_SESSION['session_started']='yes';
                    if($niveldeacceso=="E"){
                        $consulta_datos="SELECT nombre FROM empresa where documento = '".$documentofinal."'";
                         $resultado1=mysqli_query($conexion,$consulta_datos);
            while ($fila1=mysqli_fetch_array($resultado1)) {
                     $_SESSION['nombre']=$fila1['nombre'];
                    }
                }
                   if($niveldeacceso=="P"){
                        $consulta_datos="SELECT nombre1 FROM persona_natural where documento = '".$documentofinal."'";
                         $resultado1=mysqli_query($conexion,$consulta_datos);
            while ($fila1=mysqli_fetch_array($resultado1)) {
                     $_SESSION['nombre']=$fila1['nombre1'];
                    }
                }
                $band=1;
                $_SESSION['documento']=$documentofinal;
                $_SESSION['nivel_de_acceso']=$niveldeacceso;
                $_SESSION['tiempo'] = time();
                 if($fila['verificado'] =='N'){
                  session_destroy();
                  $band=2;
                
                  }
    }
    }
    
    if($band==2){
       header("Location: ../index.php/register_info");
    }
    if($band==0){
       header("Location: ../index.php/login?state=fail");
    }
    
    if($band==1 and $tipo_documento == "CC"){
       header("Location: ../index.php/resume_person");
    }
      if($band==1 and $tipo_documento == "NI"){
      header("Location: ../index.php/job_post");
    }
    
   cerrar_conexion_db($conexion);
}}
  function Job_List_Action_Model(){
        $oferta = array();  
if($_SERVER['REQUEST_METHOD']=="POST"){
        $conexion=conectar_base_de_datos();
        $donde =htmlentities($_POST['donde']); 
        $trabajo=htmlentities($_POST['trabajo']);
        $consulta = "SELECT * FROM `oferta` WHERE `vacante` LIKE '%".$trabajo."%' AND `ciudad` LIKE '%".$donde."%' ORDER BY fecha_publicacion DESC ";
        $resultado=mysqli_query($conexion,$consulta);
        $cont=0;
            while ($fila=mysqli_fetch_array($resultado)) {
                 $oferta[$cont]['id_oferta']=$fila['id_oferta'];
                $oferta[$cont]['vacante']=$fila['vacante'];
                $oferta[$cont]['descripcion_profesional']=$fila['descrip_prof'];
                $oferta[$cont]['departamento']=$fila['departamento'];
                $oferta[$cont]['ciudad']=$fila['ciudad'];

                $oferta[$cont]['fecha']=$fila['fecha_publicacion'];
                $docu = $fila['documento'];
                $consulta2="SELECT nombre FROM empresa WHERE documento ='".$docu."'";
                $resultado2=mysqli_query($conexion,$consulta2);
                    while ($fila2=mysqli_fetch_array($resultado2)) {
                            $oferta[$cont]['nombre']=$fila2['nombre'];
                    }
                $consulta3="SELECT foto FROM persona WHERE documento ='".$docu."'";
                $resultado3=mysqli_query($conexion,$consulta3);
                    while ($fila3=mysqli_fetch_array($resultado3)) {
                            $oferta[$cont]['foto']=$fila3['foto'];
                    }
            $cont++;
            }
    if($cont==0){
        $oferta[0]="N";
        return $oferta;
    }else{
  return $oferta;
  }}

return $oferta;
}

function Show_Job_Action_Model(){
if (isset($_GET['offerNo'])){
if($_GET['offerNo']=="" ){
header("Location: /empleo/index.php/404_error");
}
 $conexion=conectar_base_de_datos();
$oferta_detailed=array();
$No_oferta = $_GET['offerNo'];
$cont = 0;
$consulta = "SELECT * FROM oferta WHERE `id_oferta` = '".$No_oferta."'";
        $resultado=mysqli_query($conexion,$consulta);
            while ($fila=mysqli_fetch_array($resultado)) {
                $oferta_detailed[]=$fila;
}
return $oferta_detailed;
}
else{
     header("Location: /empleo/index.php/404_error");
}
}

?>