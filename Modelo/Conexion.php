<?php
class Conexion
{
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;

    public function abrir()
    {
        $this->mySQLI = new mySQLI("Localhost", "root", "", "tienda_tenis");
        if (mysqli_connect_error()) {
            return 1;
        } else {
            return 0;
        }
    }
    public function cerrar()
    {
        $this->mySQLI->close();
    }
    public function consulta($sql)
    {
        $this->sql = $sql;
        $this->sql = $this->mySQLI->query($this->sql);
        $this->result = $this->sql;
        $this->filasAfectadas = $this->mySQLI->affected_rows;
    }
    public function obtenerFilasAfectadas()
    {
        return $this->filasAfectadas;
    }
    public function obtenerResult()
    {
        return $this->result;
    }
}
