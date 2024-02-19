<?php
class ini
{
    //Função para conectar com o banco de dados Postgres
    public function lerini()
    {               
        $ini = parse_ini_file('config.ini', true);
        return $ini;
    }
}

?>
