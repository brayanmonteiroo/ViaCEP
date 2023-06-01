<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Consulta de CEP</h1>
        <p> Neste projeto estou cosumindo a API do ViaCEP com PHP OO usando o Curl. Foi adicionado um código Ajax para a melhor experiência na hora de usar o formulário.</p>
        <form id="cepForm" method="POST" action="">
            <div class="mb-3">
                <label for="cep" class="form-label">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control" maxlength="8">
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <hr>
        <div id="resultado"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cepForm').submit(function(event) {
                event.preventDefault(); // Evita o envio tradicional do formulário

                var cep = $('#cep').val(); // Obtém o valor do campo CEP

                $.ajax({
                    url: 'consultaCEP.php', // Arquivo PHP que fará a consulta do CEP
                    type: 'POST',
                    data: { cep: cep }, // Dados a serem enviados
                    dataType: 'html',
                    success: function(response) {
                        $('#resultado').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
