
<?php

	function getStock($id_producto){
		try{
			global $conn; 
			$queryStock = "SELECT * FROM producto WHERE id_producto = $id_producto";
			if($stock = $conn->query($queryStock)->fetch() ) {
			//echo "Existencias de ".$stock['nombre'].": ".$stock['stock'];
				return $stock;
			}
			if(!$stock){
				echo "No se ha encontrado ningun producto con la ID especificada";
			}
		}catch(Exception $e){
			exit("Error...". $e->getMessage());
		}
	}//fin getStock

	function quitar($cantidad,$id_producto){//returns 0 if succeful  
		
		try {
			global $conn; 
			$queryQuitar = "UPDATE producto SET stock = (stock -$cantidad) WHERE id_producto = $id_producto;";	
			if($nuevoStock = $conn->prepare($queryQuitar)->execute()) {
				//echo "Sacadas ".$cantidad."unds del producto con identificador: ".$id_producto;
				return 0; 
			}
		} catch (Exception $e) {
			exit("Error...". $e->getMessage());	
		}
	}//fin quitar
	/*returns last id_factura if inserted sucecfully, 0 in other case*/
	function introduce_factura($id_usuario){
		global $conn; 
		try {
			$statementMeterFactura = $conn->prepare("INSERT INTO factura(id_usuario) VALUES ($id_usuario)");
			//echo "statement preparado <br>";
			$conn->beginTransaction();
			//echo "comenzando transaccion...  <br>";
        	$statementMeterFactura->execute();
        	//echo "execute realizado... <br>";
        	$id_ultimaFactura = $conn->lastInsertId('id_factura');
        	//echo "Ultima factura introducida: ".$id_ultimaFactura;
        	$conn->commit();
        	return  $id_ultimaFactura; 
			

		} catch (Exception $e){ exit("Error...". $e->getMessage());	}

	}//fin introduce_factura
	function detalleAFactura($id_detalle,$id_factura,$id_producto,$precio,$cantidad){
		
		try {
			global $conn; 
			//echo "detalle, idfacturar, id_producto,precio,cantidad";
			//echo " ".$id_detalle." ".$id_factura." ".$id_producto." ".$precio." ".$cantidad."<br>";
			$statementMeterDetalle = $conn->prepare("INSERT INTO detalle (id_detalle,id_producto,
			id_factura, cantidad, precio) 
			VALUES ($id_detalle, $id_producto ,$id_factura , $cantidad, $precio)");
			$statementMeterDetalle->execute();
			//echo "Linea-detalle introducida <br>";
		} catch (Exception $e) { exit("Error...". $e->getMessage()); }

	} 
	
	

  ?>
 