
<?php
/* criação de um exemplo singleton*/
class Pessoa
{

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Pessoa();
        }
        return $instance;
    }
    private function __construct()
    {
    }
    public function setNome($n)
    {
        $this->nome = $n;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setIdade($i)
    {
        $this->idade = $i;
    }
    public function getIdade()
    {
        return $this->idade;
    }
}
$cara = Pessoa::getInstance();
$cara->setNome("Jeferson Lelis");

//echo "Nome: " . $cara->getNome();

$cara2 = Pessoa::getInstance();
$cara2->setNome("jlelis");
$cara2->setIdade(90);
echo "Nome 1: " . $cara->getNome() . PHP_EOL;
//mesmo sendo um objeto só ele pega o ultimo valor atribuido a variavel
echo "Idade: " . $cara->getIdade();


?>