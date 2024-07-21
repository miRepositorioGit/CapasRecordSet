<?php
/** Control.php
 *  Descripción.
 *	  Retorna un arrgelo con elementos de la url
 *    Define tipo de controlador: por omisión, especializado contenido en la URL
 *    Define al elemento método contenido en la URL
 *    Define al elemento parámetros contendos en la URL
 *    Ejecuta al elemento método con elemento argumentos, desde un elemento clase contenidos en la url 
 *   
 *	Toda clase de tipo controlador debe tener un index
 */
class Control
{
  protected $controlador = "Libros";// controlador por omisión
  protected $metodo = "index";      //  metodo por omisión
  protected $parametros = [];		// define un arreglo para índices 
  
  function __construct()
  {
	  /*retorna un arreglo-asociativo con los elementos de la url */
    $url = $this->separarURL();
	
	//echo "<br> desgloce URL: ";
	//var_dump($url);
	
	/*Si existe controlador especializado, actualiza controlador*/
    if ($url!="" && file_exists("../app/controladores/".ucwords($url[0]).".php"))
	{
      $this->controlador=ucwords($url[0]);
	  //echo "<br>elemento controlador: ".$this->controlador."<br>";
	  unset($url[0]);// inicializa con null el espacio de memoria del controlador
    }
	
	/*carga en memoria e interpreta un tipo de controlador: por omisión, especializado*/
    require_once("../app/controladores/".ucwords($this->controlador).".php");
	/*instancia tipo de controlador*/
    $this->controlador=new $this->controlador;
	
	
    /*** verificamos la existencia del elemento método ***/
    if (isset($url[1])) 
	{
		/*comprueba si existe el elemento método $url[1] de una en el $this->controlador*/
		if (method_exists($this->controlador, $url[1]))
		  {
			$this->metodo = $url[1]; // asigna elemento elemento método encontrado en la url
			echo "metodo encontrado: ".$this->metodo."<br>";
			unset($url[1]);// inicializa con null el espacio de memoria del controlador
		  }
    }
	
    /* Validación de existencia de url. recupera todos los elementos parámetros de la url 
	en un arrelo con índices, caso contrario devuelve un arreglo vacio*/    
    $this->parametros = $url ? array_values($url) : [];
	
	/*ejecuta  un metodo de una clase, con parametros*/
    call_user_func_array(
      [$this->controlador, $this->metodo], // elemento contolador, elento método
      $this->parametros					   // elemento parámetros 
    );
  }

/*retorna un arreglo de strings*/
  private function separarURL()
  {
    $url = "";
    if (isset($_GET["url"]))
	{
      $url = rtrim($_GET["url"],"/");
      $url = filter_var($url,FILTER_SANITIZE_URL);
      $url = explode("/",$url);
    }
    return $url; // retorna arreglo de elementos
  }
}
?>