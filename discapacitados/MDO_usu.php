<?php require_once('Connections/conncornejo.php');include ('Menu.php') ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['usuario'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['usuario'] : addslashes($_GET['usuario']);
}
mysql_select_db($database_conncornejo, $conncornejo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios, niveles WHERE usuarios.nivel_usu =niveles.nivel_usu AND usuarios.Nombre LIKE '%%%s%%'", $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conncornejo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<?php
$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<script language="JavaScript"> <!-- Escrip para ventana emergente  -->
function confirmar ( mensaje ) { 
return confirm( mensaje ); 
} 
</script><head>
<title>Lista de Usuarios Autorizados</title></head>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="ctab">
  <tr>
    <td align="center" valign="top" scope="col">
	<form id="form1" name="form1" method="get" action="">
		<table width="90%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td class="estil1">&nbsp;</td>
			<td class="estil1">Incluir Nuevo Usuario</td>
		    <td class="estil1">Buscar usuario </td>
		  </tr>
		  <tr>
		    <td  class="estil2"><input type="submit" name="buscar2" value="Mostar Todo"/></td>
			<td  class="estil2"><a style="text-decoration:none"  href="MDO_usuInc.php"><span><i class="icon icon-users" ></i></span></a></td>
		    <td  class="estil2">
			<input name="usuario" type="text" id="usuario" />
              <input type="submit" name="buscar" value="buscar" />
           	    </td>
		  </tr>      
    	</table> </form>	
    <p>&nbsp;</p>
      <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="7" class="estil1">Lista de Usuarios Autorizados</td>
          </tr>
          <tr>
            <td width="5%" class="estil2">Registro</td>
            <td width="15%" class="estil2">Nombre</td>
            <td width="15%" class="estil2">Apellido</td>
            <td width="15%" class="estil2">Usuario</td>
            <td width="10%" class="estil2">Clave</td>
            <td width="30%" class="estil2">Nivel de Acceso</td>
            <td width="10%" class="estil2">Editar o Borrar</td>
          </tr>
          <?php $numero = $startRow_Recordset1 + 1 /*Definicion de la Variable de Contador*/; do { ?>
            <tr valign="middle">
              <td class="estil3"><?php echo $numero;($numero++); ?></td>
              <td class="estil3"><?php echo $row_Recordset1['Nombre']; ?></td>
              <td class="estil3"><?php echo $row_Recordset1['Apellido']; ?></td>
              <td class="estil3"><?php echo $row_Recordset1['nom_usu']; ?></td>
              <td class="estil3"><?php echo $row_Recordset1['clav_usu']; ?></td>
              <td class="estil3"><?php echo $row_Recordset1['nombre_niv']; ?></td>
              <td class="estil3"><a style="text-decoration:none"  href="MDO_usuMod.php?UsuID=<?php echo $row_Recordset1['Id_usu']; ?>"><span><i class="icon icon-loop" ></i></span></a>&nbsp;&nbsp;&nbsp; <a style="text-decoration:none"  href="MDO_usuBor.php?UsuID=<?php echo $row_Recordset1['Id_usu']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el Usuario <?php echo $row_Recordset1['nom_usu']; ?>?')"><span><i class="icon icon-remove2" ></i></span></a></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          <tr valign="middle">
            <td colspan="4" align="left" class="estil5">
              <table width="20%" border="00" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Mostrar si no es la primera página ?>
                    <a style="text-decoration:none" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><i class="icon icon-first" ></i></a>
                  <?php } // Mostrar si no es la primera página ?>                </td>
                  <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Mostrar si no es la primera página ?>
                      <a style="text-decoration:none" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><i class="icon icon-previous" ></i></a>
                      <?php } // Mostrar si no es la primera página ?>                </td>
                  <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Mostrar si no es la ultima página ?>
                      <a style="text-decoration:none" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><i class="icon icon-next" ></i></a>
                      <?php } // Mostrar si no es la ultima págin ?>                </td>
                  <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Mostrar si no es la ultima págin ?>
                      <a style="text-decoration:none" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><i class="icon icon-last" ></i></a>
                      <?php } // Mostrar si no es la ultima págin ?>                </td>
                </tr>
              </table></td>
            <td colspan="3"align="right" class="estil5">Mostrando desde <?php echo ($startRow_Recordset1 + 1) ?> hasta <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> , de un total de <?php echo $totalRows_Recordset1 ?> registros </td>
          </tr>
        </table>
        <?php } // Show if recordset not empty ?><p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php
mysql_free_result($Recordset1);
?>