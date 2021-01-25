### Project using modified template, the admin page was added to include, delete and edit the contents of the web, in addition a connection was made to the database, with 2 tables, one for the admin login, and another for the display contents. .

| [pt-BR](README.pt-BR.md) | en-US - this file |
|---|---|

required .htaccess for removing routes;

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
## Index:


In the index is the wheels of the page, where they are sent to the web page.
The Web calls thme files for display, in addition to being responsible for verifying the data and defining the actions of the application.


The image below shows how the content is showing in the home

![home](/readmeImag/home.png)


And the admin panel
![painel](/readmeImag/painel.png)



