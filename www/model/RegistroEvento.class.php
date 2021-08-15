<?php
require_once "User.class.php";

class TipoEvento {
    public $id_tipo_evento;
    public $tipo_evento;
    public $descricao;


}

class RegistroEvento {
    public $dthr_registro;
    public $quantidade;
    public $id_user;
    public $id_tipo_evento;


    public function ListaTipoEventos() {
        $Matriz = array();
        $cont=0;
        $Db = new Db;
        $qr = "select * from tipo_evento";
        $rs = $Db->m_query($qr);
        while($x=$Db->m_fetch_array($rs)) {
            $TipoEvento = new TipoEvento;
            $TipoEvento->id_tipo_evento = $x['id_tipo_evento'];
            $TipoEvento->tipo_evento = $x['tipo_evento'];
            $TipoEvento->descricao = $x['descricaoo'];
            $Matriz[$cont++] = $TipoEvento;
        }
        $Db->m_close();
        return $Matriz;
    }
    
    public function RegistraEvento() {
        $Db = new Db;
        $qr = "insert into registro_evento set 
        dthr_registro = now(), 
        id_tipo_evento = '$this->id_tipo_evento', 
        quantidade = '$this->quantidade',
        id_user = '$this->id_user'"; 
        $Db->m_query($qr);
        $Db->m_close();
    }

}
?>