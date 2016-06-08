<html>

<section>
		<article>
			<a href="#"><img src="../img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	<section id="Nav_per">
		<header>
			<nav id="Nav_per">
				<ul class="nav nav-pills">
					<li class="active"><a href="../Reg_1.php">Registro</a></li>
                    <li><a href="../Update_Reg1.php">Actualizacion</a></li>
					<li><a href="../Buscar_usu.php">Buscar</a></li>
					<li><a href='../Modulo/busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='../Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='../bus_usu.php'>Usuarios</a></li>";
										  
								}
								echo "<li><a href='../logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		</header>
	</section>
		</html>