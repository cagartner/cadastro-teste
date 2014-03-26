## Cadastros de Pessoas de SC e PR

Desenvolvimento de um sistema básico de cadastro de pessoas no estado de SC e PR

### Requerimentos:

O Laravel necessita rodar em PHP 5.3+, Composer (para desenvolvimento), Node.js (para desenvolvimento)

### Instalação:

Para instalar o sistema você deve jogá-lo na pasta que você desejar do seu servidor PHP, para instalar todas as dependências você deve abrir o terminal nessa pasta e digitar o seguinte comando:

    composer update

Após isso editar as configurações de banco de dados em "app/config/database.php" com os dados do seu banco.

Configurando os acessos acessar o terminal novamente e executar o seguinte comando:

    php artisan migrate

Onde será criado automaticamente o banco de dados conforme modelo do mesmo que fica na pasta "app/database/migration/"

### Arquivo de configuração de estado

Para mudar o estado padrão de cadastro altere a linha 79 do arquivo app.php que fica localizado em "app/config".

### Finalização

Em caso de dúvidas entre em contato com contato@carlosgartner.com.br

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
