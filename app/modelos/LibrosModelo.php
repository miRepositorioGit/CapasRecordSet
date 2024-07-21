<?php
/**
 * LibrosModelo.php gestiona una interfaz para el RecordSet.
 * Define un objeto tipo MySQLdb()
 * y retorna un arrgeglo idexado con registro-atributos de la tabla: libros
 * 
 */
class LibrosModelo
{
  private $objMySQLdb;//define objeto tipo MySQLdb
  
  /*define una instancia tipo MySQLdb() para acceder a la base de datos */
  function __construct()
  {
    $this->objMySQLdb=new MySQLdb();
  }
  
/*retorna un RecordSet arreglo de registros-atributos de la base de datos
mysqli_fetch_assoc retorna una fila de resultados como un arreglo asociativo.
retorna en $data un RecordSet (conjunto de registros extraido de una bd)
*/
  public function getLibros()
  {
    $data=$this->objMySQLdb->querySelect("SELECT * FROM libros");
	return $data;
  }
}
?>