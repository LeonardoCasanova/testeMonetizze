<?php

class Apostas {

    private $qtdDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos = [];

    /**
     * @return mixed
     */
    public function getQtdDezenas()
    {
       return $this->qtdDezenas;
    }

    /**
     * @param mixed $qtdDezenas
     */
    public function setQtdDezenas($qtdDezenas)
    {
        if (in_array($qtdDezenas,[6,7,8,9,10])) {
            $this->qtdDezenas = $qtdDezenas;
        }
    }


    /**
     * @return mixed
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * @param mixed $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * @return mixed
     */
    public function getTotalJogos()
    {
        return $this->totalJogos;
    }

    /**
     * @param mixed $totalJogos
     */
    public function setTotalJogos($totalJogos)
    {
        $this->totalJogos = $totalJogos;
    }

    /**
     * @return array
     */
    public function getJogos()
    {
        return $this->jogos;
    }

    /**
     * @param array $jogos
     */
    public function setJogos($jogos)
    {
        $this->jogos = $jogos;
    }


   public function __construct($qtdDezenas, $totalJogos)
   {
       $this->qtdDezenas = $qtdDezenas;
       $this->totalJogos = $totalJogos;
   }


   private function  gerarDezena() {
       $value = rand(1, 60);

       return str_pad($value,2,0,STR_PAD_LEFT);
   }

   public function gerarJogos() {

       $resultado = [];

        for ($i = 0; $i < $this->getTotalJogos(); $i++) {
            if(!isset($this->getJogos()[$i]))
               $this->getJogos()[$i] = [];
            for($j = 0; $j < $this->getQtdDezenas();$j++) {
                $resultado[$i][$j] = $this->gerarDezena();
            }
            sort($resultado[$i]);
        }

        $this->setJogos($resultado);
        return $this->getJogos();
   }


   public function realizarSorteio(){

       $resultado = [];

       for ($i = 0; $i < 6; $i++) {
         $value = rand(1, 60);
         $resultado[] = str_pad($value,2,0,STR_PAD_LEFT);
       }
       sort($resultado);
       $this->setResultado($resultado);
   }

   public function conferirJogos() {

        foreach ($this->getJogos() as $key => $value) {

            $result_array = array_intersect($this->getResultado(), $value);

            echo "<tr>
                    <td>".implode(' - ', $value)."</td>
                    <td>".implode(' - ', $this->getResultado())."</td>
                    <td>".implode(' - ', $result_array)."</td>
                  </tr>";
        }

   }

}