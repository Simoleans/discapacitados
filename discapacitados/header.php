<html>

<section>
		<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills" id="navegar">
				<li><a href="Reg_1.php">Registro</a></li>
                    <li><a href="Update_Reg1.php">Actualizacion</a></li>
					<li><a href="Buscar_usu.php">Buscar</a></li>
					<li><a href="reg_don.php">Registrar Donacion</a></li>
					<li><a href="Modulo/bus_donacion.php">Ver Donaciones</a></li>
					<li><a href='Modulo/busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='bus_usu.php'>Trabajadores</a></li>";
										  
								}
								echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		
		</html>