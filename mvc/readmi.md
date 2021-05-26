1 - colocar no htaccess da pasta public o nome da pasta raiz

    <ifModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /nome_pasta_raiz/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
    </ifModule>


2 - Alterar arquivo configuracoes mudar valor da variavel URL

    Caminho - app/configuracao.php';

3 - Banco de dados
    
    Caminho - app/Libraries/Database.php';