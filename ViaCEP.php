<?php 

namespace App\WebService;

class ViaCEP{

    /**
     * Método responsável por consultar um CEP no ViaCEP
     *
     * @param string $cep
     * @return array
     */
    public static function consultarCEP($cep)
    {
        // INICIA O CURL
        $curl = curl_init();

        //CONFIG CURL
        curl_setopt_array($curl,[
            CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        // EXECUÇÃO
        $execucao = curl_exec($curl);

        // FECHA A CONEXÃO ABERTA
        curl_close($curl);

        // CONVERTE O JSON PARA ARRAY
        $array = json_decode($execucao,true);

        // RETORNAR O CONTEÚDO EM ARRAY
        return isset($array['cep']) ? $array : null;
    }

}