### Desafio - Facilita:

#### Tecnologias utilizadas

-   Laravel 9, PHP 8.1 e Sail (docker)
-   TailwindCSS com o Vite (Construtor rápido de Javascript)

#### Instalação

-   Clone o projeto em seu ambiente de desenvolvimento

-   Instale as dependência necessárias para o sistema

```bash
composer install
npm install
```

-   Crie um arquivo .env baseado no arquivo .env.example e substitua alguns dados por estes:

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=facilita
DB_USERNAME=sail
DB_PASSWORD=password
```

- Execute o comando a seguir para subir os containers necessários da aplicação:

```bash
sail up -d
```

-   Execute o comando a seguir para criar uma chave específica de seu sistema Laravel

```bash
sail artisan key:generate
```

- A seguir, os comandos necessários para criação das tabelas e dados fictícios:

```bash
sail artisan migrate
sail artisan db:seed --class=DatabaseSeeder
```

- Finalmente, para iniciar e acessar o projeto:

```bash
npm run dev
```

- Autenticação:
```bash
email: admin@laravel.io
senha: password
```

### Observação

- O frontend pode parecer que está piscando nas transilçoes de tela. Isto ocorre em quaisquer ambiente de desenvolvimento.
