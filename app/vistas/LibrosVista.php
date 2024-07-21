<!-- LibrosVista.php Tabla es un archivo que renderiza el RecorSet de la petición URL por omisión, renderiza un arreglo asociaivo $data
-->
<!DOCTYPE html>
<html>
<head>
  <title>Biblioteca</title>
  <meta charset="utf-8">
</head>
<body>
  <table border='1'>
  <caption ALIGN=top>Biblioteca por omisión.</caption>
	<thead>
		<th>Id</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Editorial</th>
	</thead>
	<tbody>
			<?php /*value=$data[key][key] es un arreglo asociativo*/
			for ($i=0; $i < count($data); $i++)
				{ 
					print "<tr>";
					print "<td>".$data[$i]["id"]."</td>";
					print "<td>".$data[$i]["titulo"]."</td>";
					print "<td>".$data[$i]["autor"]."</td>";
					print "<td>".$data[$i]["editorial"]."</td>";
					print "</tr>";
				}
			?>
	</tbody>
  
  </table>
</body>
</html>