<?php

class conexao
{

    /*
        Altere as variaveis a seguir caso necessario
    */

    private $db_host = 'br-cdbr-azure-south-b.cloudapp.net'; // Nome do Host no windows azure// 
    private $db_user = 'b733f596966f74'; // usuario do banco //
    private $db_pass = '52119121'; // senha do usuario do banco // 
    private $db_name = 'wwc_lions'; // nome do banco
    private $db_port = '3306'; // nome da porta

    private $con = false;

   
    public function connect() // estabelece conexao
    {
         if(!$this->con)
        {
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn)
            {
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb)
                {
                    mysql_query("SET NAMES 'utf8'");
                    mysql_query('SET character_set_connection=utf8');
                    mysql_query('SET character_set_client=utf8');
                    mysql_query('SET character_set_results=utf8');
                    $this->con = true;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

   
    public function disconnect() // fecha conexao
    {
    if($this->con)
    {
        if(@mysql_close())
        {
                        $this->con = false;
            return true;
        }
        else
        {
            return false;
        }
    }
    }
      
}

?>
