<?php
header('Content-Type: application/json; charset=utf-8');

// ===== INCLUDES MANUAIS =====
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function respond($ok, $message, $field_errors = []) {
  echo json_encode([
    'ok' => $ok,
    'message' => $message,
    'field_errors' => (object)$field_errors
  ], JSON_UNESCAPED_UNICODE);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  respond(false, 'Método inválido.');
}

// ===== SANITIZAÇÃO =====
$name    = trim($_POST['name'] ?? '');
$process = trim($_POST['process'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$state   = trim($_POST['state'] ?? '');
$email   = trim($_POST['email'] ?? '');
$value   = trim($_POST['value'] ?? '');
$privacy = isset($_POST['privacy']);

// ===== VALIDAÇÃO =====
$errors = [];

if (mb_strlen($name) < 3) $errors['name'] = 'Informe seu nome.';
if (mb_strlen($process) < 5) $errors['process'] = 'Informe o número do processo.';

$phone_digits = preg_replace('/\D+/', '', $phone);
if (strlen($phone_digits) < 10) $errors['phone'] = 'Telefone inválido.';

if ($state === '') $errors['state'] = 'Selecione o estado.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'E-mail inválido';

$value_digits = preg_replace('/\D+/', '', $value);
if (!$value_digits) $errors['value'] = 'Informe o valor do precatório.';

if (!$privacy) $errors['privacy'] = 'Aceite a política de privacidade.';

if ($errors) {
  respond(false, 'Verifique os campos.', $errors);
}

// ===== EMAIL =====
try {
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'maxcarvalholobao@gmail.com';
  // SENHA EXPOSTA APENAS PARA FINS DE TESTE
  $mail->Password   = 'rdmt jkna froe iere';
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;
  $mail->CharSet    = 'UTF-8';

  $mail->setFrom('maxcarvalholobao@gmail.com', 'Landing Page');
  $mail->addAddress('contato@contatodeteste.com.br');
  $mail->addReplyTo($email, $name);

  $mail->Subject = 'Novo contato - Landing Page';

  $mail->Body = "
    Novo contato recebido:

    Nome: {$name}
    Processo: {$process}
    Telefone: {$phone}
    Estado: {$state}
    E-mail: {$email}
    Valor: {$value}
 ";

  $mail->send();

  respond(true, 'Mensagem enviada com sucesso!');
} catch (Exception $e) {
  respond(false, 'Erro ao enviar: ' . $mail->ErrorInfo);
}
