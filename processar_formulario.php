<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Configurações de email
    $to = "sotc16@hotmail.com"; // Substitua pelo seu endereço de email
    $subject = "Nova mensagem de contato de $nome";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Mensagem de email
    $message = "<html><body>";
    $message .= "<h1>Nova mensagem de contato de $nome</h1>";
    $message .= "<p>Email: $email</p>";
    $message .= "<p>Mensagem:</p>";
    $message .= "<p>$mensagem</p>";
    $message .= "</body></html>";

    // Enviar o email
    if (mail($to, $subject, $message, $headers)) {
        $response = array("success" => true, "message" => "Mensagem enviada com sucesso!");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde.");
        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "message" => "Acesso inválido ao arquivo.");
    echo json_encode($response);
}
?>
