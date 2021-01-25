##### Projeto usando template modificado , foi adicionado a pagina do admin para incluir, excluir e editar os conteudo da web, alem disso foi feita conexação com banco de dados , com 2 tabelas , uma para o login do admin, e outra para os conteudo de exibiçao. 
| [en-US](README.md) | pt-BR this file |
|---|---|

.htaccess necessário para as rotas;
## .htaccess
```apacheconf
RewriteEngine On
Options All -Indexes

# ROUTER WWW Redirect.
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1
```
##

Na index fica as rodas  da pagina , aonde sao mandadas para a pagina web.
A Web chama os arquivos de thme para exibicao, alem de ser responsavel por verificacao do dados e definir as ações da aplicação.


A imagem abaixo mostra como estão a exibição do conteudo na home

![home](/readmeImag/home.png)


E o painel do admin
![painel](/readmeImag/painel.png)





