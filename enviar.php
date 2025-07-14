<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["mensagem"]);

    if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($mensagem)) {
        echo "Preencha todos os campos corretamente.";
        exit;
    }

    $para = "araujoreisoficial@gmail.com"; // 🔁 Troque para seu e-mail real
    $assunto = "Nova mensagem do formulário";
    $corpo = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";
    $cabecalho = "From: $nome <$email>";

    if (mail($para, $assunto, $corpo, $cabecalho)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar. Verifique se o servidor suporta envio de e-mail.";
    }
} else {
    echo "Acesso inválido.";
}

header("Location: obrigado.html");
exit;

?>
