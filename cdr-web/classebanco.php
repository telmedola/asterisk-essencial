<?php
include "classeconfig.php";
class conexaoDB
{
    private $_db;
    private $_host;
    private $_user;
    private $_pass;
    private $_port;
    private $conexao;
    private $_tipodb;
    private $_ini;


    public function __construct()
    {
        $clsini = new ini;

        $this->_ini = $clsini->lerini();
        $this->_tipodb = null;

    }

    public function conectar()
    {
        try
        {
            //printf( "BANCO -> "."".$this->_host.":".$this->_port."");

            //$connect = mysqli_connect($this->_host,$this->_user,$this->_pass,$this->_db);
            $connect = new mysqli($this->_host,$this->_user,$this->_pass,$this->_db);


            $this->conexao = $connect;

            return $connect;

        } catch (Exception $e) {
            echo "Excecao pega: ", $e->getMessage(), "\n";
        }
    }


    public function fechar()
    {
        //mysqli_close($this->conexao);
        $this->conexao->close();

        $this->conexao = null;
    }

    private function setAtributos($db, $host, $user, $pass, $port)
    {
        $this->_db	= $db;
	$this->_host	= $host;
	$this->_user    = $user;
	$this->_pass	= $pass;
        $this->_port    = $port;
     }

    public function SetaTipoConexao($tipo)
    {
        $porta = 3306;
        if (!empty($this->_ini['banco_asterisk']['port'])) {
           $porta = $this->_ini['banco_asterisk']['port'];
        }

        if ($tipo=="asterisk"){
            $this->setAtributos($this->_ini['banco_asterisk']['database'],
                                $this->_ini['banco_asterisk']['host'],
                                $this->_ini['banco_asterisk']['usuario'],
                                $this->_ini['banco_asterisk']['senha'],
                                $porta);
        }
        if ($this->_tipodb != $tipo){
           $this->_tipodb = $tipo;
        }
    }
    public function GetTipo()
    {
        return $this->_tipodb;
    }

    public function open_query($sql)
    {
        if ($this->conexao == null)
        {
            $this->conectar();
        }

        //$prepare = $this->conexao->prepare($sql);
	//$prepare->execute();
        //return $prepare;

        $prepare = $this->conexao->stmt_init();
        $prepare->prepare($sql);
        $prepare->execute();
	return $prepare;

    }

   
    public function exec_query($sql)
    {
        if ($this->conexao == null)
        {
            $this->conectar();
        }

        return $this->conexao->prepare($sql);

    }
}

class conexao_astersk extends conexaoDB
{

    public function __construct()
    {
        parent::__construct();
        $this->SetaTipoConexao("asterisk");
    }

}
?>
