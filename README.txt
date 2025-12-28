# Landing Page (HTML + Bootstrap + PHP)

## Estrutura
- index.html
- assets/css/style.css
- assets/libs/bootstrap/ 
- mail/mail.php

Arquivos Principais

index.html
Arquivo principal da aplicação. Contém toda a estrutura da landing page, organizada em seções:
Header fixo
Navegação com destaque da seção ativa (scrollspy customizado)
Menu responsivo com collapse no mobile

Hero

Apresentação principal + formulário de contato
Empresa
Seções institucionais com cards e imagens
Como funciona
Etapas do processo em cards
Por que escolher
Diferenciais com ícones e textos
FAQ
Accordion customizado com animação e comportamento responsivo

Footer

Informações de contato, endereço e marca
WhatsApp flutuante
Botão fixo de conversão
Também inclui scripts JavaScript responsáveis por:
Scroll suave com offset do header
Destaque automático do menu conforme a seção visível
Comportamento do FAQ (abrir/fechar)
Validação e envio do formulário via AJAX
Controle visual do header conforme o scroll
assets/css/style.css
Arquivo central de estilos do projeto.

Responsável por:

Tokens de design (cores, espaçamentos, radius)
Estilização global (tipografia, background)
Layout e responsividade
Header transparente com comportamento dinâmico
Cards, grids e seções
FAQ animado e responsivo
Footer e botão flutuante do WhatsApp
Todo o CSS foi escrito de forma customizada, utilizando Bootstrap apenas como base estrutural.

assets/img/

Contém todas as imagens utilizadas no projeto
Logotipo da empresa
Imagens institucionais
Background do hero
mail/mail.php
Arquivo responsável pelo processamento do formulário de contato.
Recebe os dados via POST (AJAX)
Realiza validações básicas
Retorna respostas em formato JSON
Pode ser integrado facilmente a serviços de e-mail ou CRM

🧩 Tecnologias Utilizadas

HTML5
CSS3 (customizado)
Bootstrap 5.3
JavaScript (Vanilla)
Google Fonts (Poppins)
Google Material Icons
Font Awesome
PHP (envio de formulário)

📱 Responsividade

O projeto foi desenvolvido com abordagem mobile-first, incluindo:

Menu colapsável com fundo próprio no mobile
Header fixo adaptado para telas menores
FAQ que expande empurrando o conteúdo (sem sobreposição)
Botão de WhatsApp sempre acessível

🚀 Objetivo do Projeto

Esta landing page foi construída para:

Apresentação institucional clara
Alta conversão via formulário e WhatsApp
Navegação fluida por seções
Fácil manutenção e escalabilidade
