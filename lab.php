<?php
 session_start();
 $p=isset($_SESSION['username']);
 $q=isset($_SESSION['password']);
 if(!($p&&$q)){
     echo "Tienes que iniciar sesion para poder acceder a nuestrso servicios";
     echo "<p>";
     echo "<a href='login.php'>Iniciar sesion</a> | <a href='registrar.php'>Registrarse</a>";
     echo "</p>";
 }else{
     echo "<p>Welcome back {$_SESSION['username']} </p>";
 

 include "header.php";
 include_once "conexion.php";
 $array= json_encode((new Conexion())->get_all());

?>
    <script>
    let dataSet =  JSON.parse(<?php
     echo "'{$array}'";
     ?>);
 
$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { data: "Dni" },
            { data: "nombre" },
            { data: "apellidos" },
        ]
    } );
} );
</script>
<table id="example" class="display" style="width:100%">
    <thead>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>      
    </thead>
</table>
    
</body>
</html>
<?php
 }
?>