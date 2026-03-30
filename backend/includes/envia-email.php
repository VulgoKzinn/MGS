<?php

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function enviaEmail($email,$senha_temp){
try {

$mail = new PHPMailer(true);

    // Configuração do SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'thiaguinho85@gmail.com';
    $mail->Password = 'audx hmrk wszw wzaz';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Charset
    $mail->CharSet = 'UTF-8';

    // Remetente
    $mail->setFrom('thiaguinho85@gmail.com', 'ThiagoM');

    // Destinatário
    $mail->addAddress($email);

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de Senha';
    $mail->Body = <<<HTML
    
<body style="background:#f3f4f6;font-family:Arial,sans-serif;margin:0;padding:0;">

<div style="display:flex;align-items:center;justify-content:center;min-height:100vh;padding:20px;">

<div style="background:#ffffff;box-shadow:0 4px 10px rgba(0,0,0,0.1);border-radius:12px;max-width:400px;width:100%;padding:32px;text-align:center;">

<h1 style="font-size:24px;font-weight:bold;color:#1f2937;margin-bottom:16px;">
Recuperação de senha
</h1>

<p style="color:#4b5563;margin-bottom:24px;">
Recebemos uma solicitação para redefinir sua senha.<br>
Use o código abaixo para continuar:
</p>

<div style="background:#f3f4f6;border-radius:8px;padding:20px;margin-bottom:24px;">
<span style="font-size:32px;font-weight:bold;letter-spacing:5px;color:#2563eb;">
{$senha_temp}
</span>
</div>

<p style="color:#6b7280;font-size:14px;margin-bottom:24px;">
Este código expira em <strong>10 minutos</strong>.
</p>

<a href="#" style="display:inline-block;background:#2563eb;color:#ffffff;font-weight:bold;padding:12px 24px;border-radius:8px;text-decoration:none;">
Redefinir senha
</a>

<p style="font-size:12px;color:#9ca3af;margin-top:30px;">
Se você não solicitou, ignore este e-mail.
</p>

</div>
</div>

</body>
HTML;
    $mail->AltBody = 'Email enviado com PHPMailer';

    // Enviar
    if ($mail->send()) {
        return "E-mail enviado com sucesso!";
    } else {
        return "Erro ao enviar: " . $mail->ErrorInfo;
    }

} catch (Exception $e) {
    return "Erro: {$mail->ErrorInfo}";
}

}