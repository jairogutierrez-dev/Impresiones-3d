
<div class="contenedor-objeto">
	<input type="hidden" id="id" value="<?php echo $item['id_producto']; ?>" >
	<div class="cont imagen-objeto">
		<img src="images/productos-images/<?php echo $item['imagen']; ?>">
	</div>

	<div class="wrapper-informacion">
		<div class="informacion-objeto">
				<div class="informacion-nombre">
					<h2><?php echo $item['nombre'] ?></h2>
				</div>
				<div class="informacion-nombre-objeto">
					<div class="informacion-nombre">
						<p>Material: <?php echo $item['material'] ?></p>
					</div>
					<div class="informacion-tamano-objeto">
						<button class="size-s">S</button>
						<button  class="size-m">M</button>
						<button  class="size-l">L</button>
					</div>
				</div>
		</div>

		<div class="compra-precio" >
			<div class="objeto-precio">
					<?php echo $item['precio'].'$' ?>
			</div>
			<div class="boton-comprar">
				<div class="boton-texto" >
				<!-- 	<span></span> -->
					<button class="btn-add">Añadir al carrito</button>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- <div class="articulo">
    <input type="hidden" id="id" value="<?php //echo $item['id_producto'];  ?>">
    <div class="imagen"><img src="images/productos-images/<?php //echo $item['imagen'];  ?>"></div>
    <div class="titulo"><?php //echo $item['nombre'];  ?></div>
    <div class="precio">$<?php //echo $item['precio'];  ?> MXN</div>
    <div class="botones">
        <button>Agregar al carrito</button>
    </div>
</div>	 -->				