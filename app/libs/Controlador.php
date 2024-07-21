<?php
/**
 * Controlador.php  cargador en memoria de modelo y vista en función de los argumentos
 * es una clase que tiene contiene a
   i)  método modelo() carga en memoria el archivo señalado por el argumento y retorna un objeto del tipo $arg_modelo, 
   ii) método vista()  carga en memoria el archivo.
	                  ├
   Controlador.php contiene un metodo que genera objetos del tipo $arg_modelo
 */
class Controlador
{
	/*retorna un objeto. Modelo en una fabrica de objetos del tipo $arg_modelo  
	$arg_modelo es un argumento tipo archivo existente /app/modelos/$arg_modelo.php */
  public function modelo($arg_modelo)
  {
	  /*carga en memoria un archivo tipo $arg_modelo*/
    require_once("../app/modelos/".$arg_modelo.".php");
      /* retorna un objeto tipo $arg_modelo */
	return new $arg_modelo();
  }
  
  /*carga en memoria el archivo la vista 
	$arg_vista es el arhivo
	$data[] son los parametros del método
  */
  public function vista($arg_vista,$data=[])
  {
	  /*valida si existe archivo solicitado*/
    if(file_exists("../app/vistas/".$arg_vista.".php"))
	{
		/*existe. carga en memoria*/
      require_once("../app/vistas/".$arg_vista.".php");
    } else 
	{
      die("La vista no existe");
    }
  }
}
?>