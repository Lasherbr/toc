<?php
require_once "User.class.php";
class Registro {
    public $dthr_evento;
    public $descricao;
    public $nexus;
    public $grau_ansiedade_observador;
    public $grau_ansiedade_paciente;
    public $id_user;

    public function RegistraEvento() {
        $Db = new Db;
        $qr = "insert into registro set 
        dthr_evento = now(), 
        descricao = '$this->descricao', 
        nexus = '$this->nexus', 
        grau_ansiedade_observador = '$this->grau_ansiedade_observador',
        grau_ansiedade_paciente = '$this->grau_ansiedade_paciente',
        id_user = '$this->id_user'"; 
        $Db->m_query($qr);
        $Db->m_close();
    }

}
?>