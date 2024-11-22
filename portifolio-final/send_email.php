<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $celular = htmlspecialchars($_POST['celular']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Verifica se o e-mail é válido
    if (!$email) {
        echo "Endereço de e-mail inválido.";
        exit;
    }

    // Configuração do e-mail
    $to = "juliamartinsdesouza33@gmail.com"; // Substitua pelo seu e-mail
    $subject = "Nova mensagem do site 4CODE";
    $body = "
        Nome: $nome\n
        E-mail: $email\n
        Celular: $celular\n
        Mensagem:\n$mensagem
    ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
    }
} else {
    echo "Método inválido.";
}
?>
