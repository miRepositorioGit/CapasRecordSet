<?php
/** MySQLdb.php Establece una conexión con servidor MySQL y retorna un arreglo de registros-atributos de la base de datos 
 *  Descripción.
 *  	Muestra como generar un objeto interfaz <conn> para gestionar con una base de datos
 *  	Muestra como la función querySelect() retorna un areglo asociativo de un fila
 * 		Abre la base de datos de tipo MySQL
 */
class MySQLdb
{
	/*define credenciales de  acceso a la base de datos*/
  private $host="localhost";
  private $usuario = "root";
  private $clave = "";
  private $db = "libreria";
  
  private $conn;//define interfaz para gestionar comunicación con la base de datos
  
  /* gestiona comunicación con la base de datos*/
  function __construct()
  {
	  /*abre una conexión al servidor MySql que esta en ejecución*/
    $this->conn=mysqli_connect($this->host,$this->usuario,$this->clave,$this->db);
	
	//echo "<br>".mysqli_get_host_info($this->conn)."\n"; // muestra localhost
	
	/*retorna codogo de error de última conexión*/	
    if (mysqli_connect_errno())
		{
			printf("Error en la conexión con la base de datos: %s",
			mysqli_connect_errno()); 
			exit();//finaliza ejecución de script
		} 
	/*define conjunto de caracteres*/
    if (!mysqli_set_charset($this->conn,"utf8")) 
		{
			printf("Error en la conversión de caracteres: %s",
			mysqli_error($this->conn)); 
			exit();
		} 
	/*verifica connexion*/	
	if(!$this->conn)
	{
		echo "Error: No se pudo conectar a phpMySql EndOfLine.".PHP_EOL;
		echo "errno de depuración: ". mysqli_connect_errno().PHP_EOL;
		echo "errno de depuración: ". mysqli_connect_errno().PHP_EOL;
		die ('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
		exit;
	}	
  }
 
  
/*retorna un, RecordSet, arreglo de registros-atributos de la base de datos
mysqli_fetch_assoc retorna una fila de resultados como un arreglo asociativo
retorna en $data un RecordSet (conjunto de registros extraido de una bd).
*/
  public function querySelect($sql)
  {
    $data = array();//arreglo asociativo clave=>valor
    $resultado=$this->conn->query($sql);// realiza una consulta la base de datos
    while($row=mysqli_fetch_assoc($resultado)) // retorna un arreglo-asociativo
	{
		array_push($data,$row);//inserta elementos al final de un array
	}
	//echo "<br>";
	//var_dump($data);
    return $data; // retorna un arreglo asociativo
  }
}
?>