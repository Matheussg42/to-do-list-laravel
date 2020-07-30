<p align="center"><a target="_blank" href="https://matheus.sgomes.dev"><img src="https://matheus.sgomes.dev/img/logo_azul.png"></a></>


👤 **Matheus S. Gomes** 

* Website: https://matheus.sgomes.dev
* Github: [@Matheussg42](https://github.com/Matheussg42)
* LinkedIn: [@matheussg](https://linkedin.com/in/matheussg)

---

<p align="center">
  
  <img alt="Back-end" src="https://img.shields.io/static/v1?label=Back-end&message=Ok&color=27ae60&labelColor=444444">
  
  <img alt="Front-end" src="https://img.shields.io/static/v1?label=Front-end&message=Ok&color=27ae60&labelColor=444444"> 

</p>

<p align="center">
  <a href="https://github.com/Matheussg42/to-do-list-laravel">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="/backend">Back-end</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="/frontend">Front-end</a>
</p>

#### Nesta Página:

* [Projeto](#projeto)
* [Configuração](#config)
* [Instalando dependências](#dependencias)
* [Subindo a aplicação](#aplicacao)

<span id="projeto"></span>
## Projeto

O ToDoList é um projeto feito para treinar o conhecimento nas tecnologias citadas a cima. Neste projeto, foi desenvolvido um gerenciador de tarefas á fazer, com a possibilidade de criar listas de tarefas, e as tarefas de cada lista. Possuindo Registro e Login para separarmos as Listas de Tarefa por usuário.

<span id="config"></span>
## Configuração

Acesse a raiz da pasta `backend`, é necessário criar o `.env` do projeto, e para isso, crie uma copia ou renomeie o arquivo `.env-dist`. O próximo passo é a criação de um novo Banco de Dados para o projeto. O nome do banco deve ser informado na linha `DB_DATABASE=` do `.env`.

<span id="dependencias"></span>
## Instalando dependências

Acesse a raiz da pasta `backend` pelo _terminal_, e instale as dependências usando o comando `composer`.

```php
composer install
```

<span id="aplicacao"></span>
## Subindo a aplicação

Acesse a raiz da pasta `backend` pelo _terminal_, digite os comandos:

```php
php artisan key:generate
```
Para gerar a chave do projeto.

```php
php artisan migrate
```
Para criar as tabelas utilizadas no projeto.

```php
php artisan migrate:refresh --seed
```
Para criar as tabelas utilizadas no projeto, já com registros.

```php
php artisan serve
```
Para iniciar o Back-end do projeto.