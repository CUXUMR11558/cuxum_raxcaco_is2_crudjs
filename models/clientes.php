<?php
require_once 'Conexion.php';

class cliente extends Conexion
{
    public $cliente_codigo;
    public $cliente_nombre;
    public $cliente_apellido;
    public $cliente_nit;
    public $cliente_telefono;
    public $cliente_situacion;

    public function __construct($args = [])
    {
        $this->cliente_codigo = $args['cliente_codigo'] ?? null;
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_apellido = $args['cliente_apellido'] ?? '';
        $this->cliente_nit = $args['cliente_nit'] ?? '';
        $this->cliente_telefono = $args['cliente_telefono'] ?? '';
        $this->cliente_situacion = $args['cliente_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO cliente (cliente_nombre, cliente_apellido, cliente_nit, cliente_telefono) values('$this->cliente_nombre','$this->cliente_apellido','$this->cliente_nit','$this->cliente_telefono')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from cliente where cliente_situcacion = 1 ";

        if ($this->cliente_nombre != '') {
            $sql .= " and cliente_nombre like '%$this->cliente_nombre%' ";
        }

        if ($this->cliente_apellido != '') {
            $sql .= " and cliente_apellido = $this->cliente_apellido ";
        }

        if ($this->cliente_nit != '') {
            $sql .= " and cliente_nit like '%$this->cliente_nit%' ";
        }

        if ($this->cliente_telefono != '') {
            $sql .= " and cliente_telefono = $this->cliente_telefono ";
        }

        if ($this->cliente_codigo != null) {
            $sql .= " and cliente_codigo = $this->cliente_codigo ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

}
