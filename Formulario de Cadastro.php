<!<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dados</title>
</head>
<body>
<img src="uploads/vem%20pra%20mim%20vovo.jpg">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $rua = $_POST["rua"];
    $complemento = $_POST["complemento"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    echo "<p><strong>Nome:</strong> $nome</p> ";
    echo "<p><strong>E-mail:</strong> $email</p> ";
    echo "<p><strong>Telefone:</strong> $telefone</p> ";
    echo "<p><strong>Rua:</strong> $rua</p> ";
    echo "<p><strong>Complemento:</strong> $complemento</p> ";
    echo "<p><strong>Cidade:</strong> $cidade</p> ";
    echo "<p><strong>Estado:</strong> $estado</p> ";
    echo "<p><strong>CEP:</strong> $cep</p> ";
}
/*
* [ upload ] sizes | move uploaded | url validation
* [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
*/

/*validação de arquivos*/

$folder = __DIR__ . "/uploads/";  /*Variavel folder seleciono o diretorio dos meus arquivos*/

if(!file_exists($folder) || !is_dir($folder)){   /*Nesse if eu vou validar se  minha variavel folder existe*/
    mkdir($folder,  0755); /*Permissão de config do nosso servidor*/
}

var_dump([                   //isso sera configurações no do nosse servidor
    "filesize" => ini_get("upload_max_filesize"),   //tamanho maximo do arquivo
    "postsize" => ini_get("post_max_size"),         //soma de todos os arquivos do servidor
]);


$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);
var_dump($_FILES);
//VAMOS LIMITAR TAMANHO DO UPLOAD PARA O TIPO BOOLEANO

if($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES['file'];
    var_dump($_FILES);

    $allowebTypes = [ /*Tipo de arquivos que vamos aceitar, na documentação podemos pesquisar por todos os name types*/
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];
}elseif ( $getPost){ /*Posso usar esse elseif para caso o arquivo passe ele emita um aviso de arquivo grande*/
    echo "<p class='trigger warning'>Whoops parece que o arquivo que você selecionou é grande demais!</p>";
} else{
    if($_FILES){
        echo "<p class='trigger warning'>Selecione um arquivo antes de Enviar!</p>";
    }
}



include __DIR__ . "/form.php";
var_dump(scandir(__DIR__ ."/uploads"));

?>

</body>
</html>