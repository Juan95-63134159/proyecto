<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProducto($id_producto)
    {
        $sql ="SELECT p.* , c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria= c.id WHERE p.id = $id_producto";
        return $this->select($sql);

    }
    //paginacion
    public function getProductos($desde, $porPagina)
    {
        $sql="SELECT *  FROM productos LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }
    //obtener el total de los productos
    public function getTotalProductos()
    {
        $sql="SELECT COUNT(*) AS  total FROM productos";
        return $this->select($sql);
    }
    //producto relacioonados con la cateegorias
    public function getProductoCat($id_categoria,$desde, $porPagina)
    {
        $sql ="SELECT * FROM productos  WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);

    }
    //obtener el total de los productos relcionados con la  categoria
    public function getTotalProductosCat($id_categoria)
    {
        $sql="SELECT COUNT(*) AS  total FROM productos  WHERE id_categoria = $id_categoria";
        return $this->select($sql);
    }

    //producto relacioonados aleatorios
    public function getAleatorio($id_categoria,$id_producto)
    {
        $sql ="SELECT * FROM productos  WHERE id_categoria = $id_categoria AND id != $id_producto ORDER BY RAND() LIMIT 20";
        return $this->selectAll($sql);

    }

}
 
?>