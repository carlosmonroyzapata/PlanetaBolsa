<?php 
		class Ocarrito{
		public $num_productos;
		public $montante;
		public $array_id_prod;
		public $array_nombre_prod;
		public $array_cantidad_prod;
		public $array_precio_prod; 
		//public $num_productos_no_cero

		function __construct() {
		    $this->num_productos = 0;
		    $this->montante = 0;
		    $this->array_id_prod[0] = 0;/*producto nulo el id_prod = 0*/
		    $this->array_nombre_prod[0] = "NoName";
		    $this->array_id_precio[0] = 0;
		    $this->array_cantidad_prod[0] = 0 ;
		} //carrito vacio se comenzará a rellenar la primera posición que coincide con num_productos

		function introduce_producto($id_prod, $nombre_prod, $cantidad_prod, $precio_prod){
		    $this->array_id_prod[$this->num_productos]       = $id_prod;
		    $this->array_nombre_prod[$this->num_productos]   = $nombre_prod;
		    $this->array_cantidad_prod[$this->num_productos] = $cantidad_prod;
		    $this->array_precio_prod[$this->num_productos]   = $precio_prod;
		    $this->num_productos++;
		    $this->montante += $precio_prod*$cantidad_prod;
		} 

		function elimina_producto($linea){
			$this->montante -=$this->array_precio_prod[$linea]*$this->array_cantidad_prod[$linea];
			//echo "Echos de elimmina producto"."<br>";
			echo "Nuevo Montante: ".$this->montante."<br>"; 
			echo "Producto numero: ".$linea."<br>
			Nombre: ".$this->array_nombre_prod[$linea]."eliminado<br>";
		    $this->array_id_prod[$linea] = 0;
		    $this->array_precio_prod[$linea] = 0; /*pongo a cero el precio del producto borrado*/
		    $this->array_cantidad_prod[$linea] = 0; 
		    $this->array_nombre_prod[$linea] = "NoName";
		    /*no se reduce el numero de elementos del carrito ya que no se han eliminado tan solo marcado como elemento NULO*/
		    
		} 
	}
 ?>