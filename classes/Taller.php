<?php 
 $filepath = realpath(dirname(__FILE__)); 
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../config/Parametros.php');
class Taller{	
  private $db;
	private $fm;

  public $adminted_exte = IMAGE_EXTN;
  public $ruta_uploads  = DIR_IMAGE;
  public $adminted_size = IMAGE_MAX_SIZE;
  public $name_of_file="";
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();    
    
	}



    public function admintedExtension($extension)
    {     
      $extensions = preg_split("/;/",$this->adminted_exte);      
      foreach ($extensions as &$ext) 
      {
        if (str_contains($extension, $ext))
        {
          return true;
        }        
      }
      return false;
    }



    public function writeMsg($msg)
    {
          echo "</br>";
          echo $msg;          
    }




    public function getSavedNameFile()
    {
      return $this->name_of_file;
    }





    public function saveFile($temp_name,$original_name,$file_zise,$file_tipe)
    {
      if( $file_zise > $this->adminted_size)      {          
          return "!El archivo es demasiado grande!, puedes subir un archivo mas liviano.";
              }
      
      if ($this->admintedExtension($file_tipe)==false)
      {        
        return "¡Posiblemente la extension del archivo no se adminte, asegurese de subir una imagen!";
      }

      $dir_subida = $this->ruta_uploads;

      if (is_uploaded_file($temp_name)) 
              {
                
                //El uso de mt_rand() es similar:
                //alimentamos el generador de aleatorios
                mt_srand (time());
                //generamos un número aleatorio
                $numero_aleatorio = mt_rand(50584,101101);
                $cadena_aleatoria = bin2hex(random_bytes(5));  
                $aleatory_name = "IM_" .$cadena_aleatoria ."-" .$numero_aleatorio. "-";        
                $file_name_to_save= $aleatory_name . str_replace(' ', '-', basename($original_name));

                $fichero_subido = $dir_subida .$file_name_to_save;
                $this->name_of_file=$file_name_to_save;
                  if (move_uploaded_file($_FILES['image']['tmp_name'], $fichero_subido)) 
                  {
                    return "OK";
                  } 
                  else 
                  {
                    return"Ocurrio un error al subir el archivo ¡vuelve a intentarlo!";
                  }                  
              } 
              else 
              {
                  return "Archivo no subido, ¡intentalo de nuevo!";
              }
    }




    public function updateTaller($nombre_taller,$mensaje_taller,$taller_link_acceso,$taller_codigo_acceso,$estado,$taller_id,$name_file_saved,$taller_tipo)
    {

      //public function updateUserData($userid, $data){
        $w_nombre_taller          = $this->fm->validation($nombre_taller);
        $w_mensaje_taller         = $this->fm->validation($mensaje_taller);
        $w_taller_link_acceso     = $this->fm->validation($taller_link_acceso);
        $w_taller_codigo_acceso   = $this->fm->validation($taller_codigo_acceso); 
        $w_estado                 = $this->fm->validation($estado);
        $w_taller_id              = $this->fm->validation($taller_id); 
        $w_taller_tipo            = $this->fm->validation($taller_tipo);
        $w_name_file_saved        =$name_file_saved;//$this->fm->validation($name_file_saved);

        $w_nombre_taller          = mysqli_real_escape_string($this->db->link,$w_nombre_taller);
        $w_mensaje_taller          = mysqli_real_escape_string($this->db->link,$w_mensaje_taller);
        $w_taller_link_acceso          = mysqli_real_escape_string($this->db->link,$w_taller_link_acceso);
        $w_taller_codigo_acceso          = mysqli_real_escape_string($this->db->link,$w_taller_codigo_acceso);
        $w_estado          = mysqli_real_escape_string($this->db->link,$w_estado);
        $w_taller_id          = mysqli_real_escape_string($this->db->link,$w_taller_id);
        $w_taller_tipo          = mysqli_real_escape_string($this->db->link,$w_taller_tipo);
        //$w_name_file_saved          = mysqli_real_escape_string($this->db->link,$w_name_file_saved);

         //$name = mysqli_real_escape_string($this->db->link,$name);
 
        $query = "call psp_taller_upd(1,'$w_nombre_taller',$w_taller_tipo,'$w_mensaje_taller','$w_taller_link_acceso','$w_taller_codigo_acceso','$w_name_file_saved',$w_taller_id,'test',$w_estado);";
         //$query->bind_param("si", $nombre, $edad);
        $updated_row = $this->db->update($query);
                     //$stmt = $db->prepare("CALL SP_insertEMB (?, ?);");
                     //$stmt->bind_param("si", $nombre, $edad);
                     //$stmt->execute();
                     //$stmt->close();
                     //$db->close();
                   if ($updated_row) {
                       $msg = "success";
                       return $msg;
                     }else{
                          $msg = "Error, al escribir los registros, ¡Intentalo de nuevo!";
                       return $msg;
                     } 
       


    }

    public function createTaller($nombre_taller,$mensaje_taller,$taller_link_acceso,$taller_codigo_acceso,$estado,$name_file_saved,$taller_tipo)
    {

      //public function updateUserData($userid, $data){
        $w_nombre_taller          = $this->fm->validation($nombre_taller);
        $w_mensaje_taller         = $this->fm->validation($mensaje_taller);
        $w_taller_link_acceso     = $this->fm->validation($taller_link_acceso);
        $w_taller_codigo_acceso   = $this->fm->validation($taller_codigo_acceso); 
        $w_estado                 = $this->fm->validation($estado);        
        $w_taller_tipo            = $this->fm->validation($taller_tipo);
        $w_name_file_saved        =$name_file_saved;//$this->fm->validation($name_file_saved);

        $w_nombre_taller          = mysqli_real_escape_string($this->db->link,$w_nombre_taller);
        $w_mensaje_taller          = mysqli_real_escape_string($this->db->link,$w_mensaje_taller);
        $w_taller_link_acceso          = mysqli_real_escape_string($this->db->link,$w_taller_link_acceso);
        $w_taller_codigo_acceso          = mysqli_real_escape_string($this->db->link,$w_taller_codigo_acceso);
        $w_estado          = mysqli_real_escape_string($this->db->link,$w_estado);
        
        $w_taller_tipo          = mysqli_real_escape_string($this->db->link,$w_taller_tipo);
        //$w_name_file_saved          = mysqli_real_escape_string($this->db->link,$w_name_file_saved);

         //$name = mysqli_real_escape_string($this->db->link,$name);
 
        $query = "call psp_gen_taller(1,'$w_nombre_taller',$w_taller_tipo,'$w_mensaje_taller','$w_taller_link_acceso','$w_taller_codigo_acceso','$w_name_file_saved','test');";
         //$query->bind_param("si", $nombre, $edad);
        $updated_row = $this->db->update($query);
                     //$stmt = $db->prepare("CALL SP_insertEMB (?, ?);");
                     //$stmt->bind_param("si", $nombre, $edad);
                     //$stmt->execute();
                     //$stmt->close();
                     //$db->close();
                   if ($updated_row) {
                       $msg = "success";
                       return $msg;
                     }else{
                          $msg = "Error, al escribir los registros, ¡Intentalo de nuevo!";
                       return $msg;
                     } 
       


    }



    
}


 ?>