<?php 

class ConexaoDB{


    //Variaveis para usar no PDO
    var $Bhost = "bagre";
    var $Buser = "wise";
    var $Bpass = "#Ws!0zWISEd1o8d0i5%";
    var $Bdb   = "sucos_vendas";
    var $Bport = 3306;

    //Variavel que vai receber o PDO
    public $conn;


    //Função __construct(Executa assim que a pagina abre)
    public function __construct()
    {

        //Crio uma condição onde não tenho certeza se o codigo vai funcionar entao tento a execução(try), caso não funcione captura o erro 
        //e me apresenta numa variavel(catch(PDOException $e)), onde dou um echo para exibir o erro
        try{
            //A variavel conn recebe/cria o novo PDO, onde passo o tipo dele(mysql), o host, a porta, o nome do Database, o charset que deve
            //ser usado para interpreta-lo e o usuario e o login 
            $this->conn = new PDO("mysql:host=" . $this->Bhost . ";port=" . $this->Bport . ";dbname=" . $this->Bdb. ";charset=utf8", $this->Buser, $this->Bpass);
            //Seto os atributos do PDO que esta na variavel conn
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "Erro ao conectar no banco de dados: " . $e;
        }
    }
}