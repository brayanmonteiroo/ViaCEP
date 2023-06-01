<?php 

require_once 'ViaCEP.php';

use \App\WebService\ViaCEP;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo CEP foi preenchido
    if (!empty($_POST['cep'])) {
        $cep = $_POST['cep'];

        // Remove qualquer caractere que não seja dígito do CEP
        $cep = preg_replace('/[^0-9]/', '', $cep);

        // Verifica se o CEP tem 8 dígitos
        if (strlen($cep) === 8) {
            $dadosCEP = ViaCEP::consultarCEP($cep);

            if (isset($dadosCEP['cep'])) {
                echo "<div class='container py-4'>";
                echo "CEP: " . $dadosCEP['cep'] . "<br>";
                echo "Logradouro: " . $dadosCEP['logradouro'] . "<br>";
                echo "Bairro: " . $dadosCEP['bairro'] . "<br>";
                echo "Cidade: " . $dadosCEP['localidade'] . "<br>";
                echo "Estado: " . $dadosCEP['uf'] . "<br>";
            } else {
                echo "CEP não encontrado.";
            }
        } else {
            echo "CEP inválido. Certifique-se de inserir 8 dígitos.";
        }
    } else {
        echo "Por favor, preencha o campo CEP.";
        echo "</div>";
    }
}