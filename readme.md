# Laravel PHP Framework Base
Project base laravel Pianolab

## Instalando composer
**Unix**

```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```
**Windows**

Baixe e instale [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe) ou siga as instruções do site [oficial](https://getcomposer.org/doc/00-intro.md#system-requirements)

## Clonando o projeto
Clonando projeto como origin base. Para que futuramente possa pegar possiveis atualização

```
git clone git@github.com:pianolab/laravel_base.git appname_apptype -o base
```

Adicionando projeto ao repositório do projeto

```
git remote add origin git@bitbucket.org:pianolab/appname_apptype.git
```

Quando estiver desenvolvendo use a branch  development. Quando a feature estiver terminada faça um merge com o master e faça o deploy. O importante é que na branch master esteja identica a servidor de produção.

### Criando branch development

```
git branch development
```

Trocando para a branch de desenvolvimento

```
git checkout development
```

Enviando código para o repositório

```
git push origin master && git push origin development
```

The master branch should be equal to the production server.

_O branch master deve ser igual ao servidor de produção._

### Configurando projeto
Duplique o arquivo `app/config/development/database.php.default` e renomei-o para `app/config/development/database.php` e configure o banco de dados.

```
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'laravel_base',
    'username'  => 'root',
    'password'  => 'raquel',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
)
```

### Configurando o banco
Crie o banco de acordo com quer você colocou nas configurações acima e rode um:

```
php artisan migrate --seed
```

Para rodar o servidor do laravel rode um:

```
php artisan serve
```
