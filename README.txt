# Landing Page (HTML + Bootstrap + PHP)

## Estrutura
- index.html
- assets/css/style.css
- assets/libs/bootstrap/  (VOCÊ PRECISA COPIAR O BOOTSTRAP AQUI)
- mail/mail.php

## Como rodar no seu local
1) Abra a pasta no terminal e rode:
   php -S localhost:8000

2) Acesse no navegador:
   http://localhost:8000/index.html

> IMPORTANTE: abrir o arquivo com duplo clique (file://) pode quebrar o AJAX.
> Use sempre um servidor local (php -S, XAMPP, WAMP, Laragon).

## Bootstrap local (requisito do teste)
Este projeto aponta para:
- assets/libs/bootstrap/css/bootstrap.min.css
- assets/libs/bootstrap/js/bootstrap.bundle.min.js

Como você está baixando este ZIP aqui, eu não consigo embutir os arquivos oficiais do Bootstrap automaticamente.
Então faça assim:

1) Baixe o Bootstrap 5 (dist) no site oficial
2) Copie os arquivos para:
   assets/libs/bootstrap/css/bootstrap.min.css
   assets/libs/bootstrap/js/bootstrap.bundle.min.js

### Alternativa rápida (somente para teste)
No index.html já deixei um CDN comentado.
Você pode descomentar o CDN para testar rapidamente e depois voltar pro modo local.

## Email (PHP mail())
- Em mail/mail.php, troque:
  $to = 'contato@contatodeteste.com.br';

- O envio depende do servidor ter suporte a mail().
  Em localhost, pode não funcionar sem SMTP configurado.
