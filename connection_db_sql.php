<!-- Simple HTML to Create the table layout -->
<table border = 1 style="background-color:#F0F8FF;" >
<caption><EM>TABLA</EM></caption>
<tr>
<th>Id</th>
<th>Fecha</th>
<th>Hora</th>
<th>Turno</th>
<th>Producto</th>
<th>Linea</th>
<th>Ccorrugados</th>
</tr>
<!-- END Simple HTML to Create the table layout -->

<?php

$servername = "M52645-2K0\SQLEXPRESS";
$database = "kcvisiondb";
$uid = "";
$pwd = "";

$connection = [
"Database" => $database,
"Uid" => $uid,
"PWD" => $pwd 
];

$conn = sqlsrv_connect($servername,$connection);
if(!$conn)
  die(print_r(sqlsrv_errors(),true));
  
  $qsql = "select * from dbo.registros";
  
  $qrsql = sqlsrv_query($conn,$qsql);

  if($qrsql == false){
    echo 'Error';
  }
 
  while($rows = sqlsrv_fetch_array($qrsql,SQLSRV_FETCH_ASSOC)){
    echo "<tr>";
    echo "<td>" . $rows['Id']. "</td>"; 
    echo "<td>" . $rows['fecha']. "</td>";
    echo "<td>" . $rows['hora']. "</td>";
    echo "<td>" . $rows['turno']. "</td>";
    echo "<td>" . $rows['producto']. "</td>";
    echo "<td>" . $rows['linea']. "</td>";
    echo "<td>" . $rows['ccorrugados']. "</td>";
    echo "</tr>";

/*
    echo $rows['fecha'].'</br>'; 
    echo $rows['hora'].'</br>'; 
    echo $rows['turno'].'</br>'; 
    echo $rows['producto'].'</br>';
    echo $rows['linea'].'</br>';
    echo $rows['ccorrugados'].'</br>';

*/    
    
    //echo $obj['Id'],['fecha'].'</br>';
    //echo ($obj);

   }

  sqlsrv_free_stmt($qrsql);
  sqlsrv_close($conn);

?>