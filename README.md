### Desafio - Facilita:

#### Tecnologias utilizadas

-   Laravel 9, PHP 8.1 e Sail (docker)
-   TailwindCSS com o Vite (Construtor rápido de Javascript)

#### Instalação

```bash
git checkout diego-sousa-dias
git pull origin diego-sousa-dias
```

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

-   Execute o comando a seguir para criar uma chave específica de seu sistema Laravel

```bash
sail artisan key:generate
```

-   Finalmente, para que o frontend inicie:

```bash
npm run dev
```
