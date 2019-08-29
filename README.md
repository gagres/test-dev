# Teste PHP para Desenvolvedor

## Requisitos
|Tech|version|
|---|---|
|PHP|>7.3|
|Laravel|>5.8|
|postgres|10.4|
|docker|>18|
|docker-compose|>1.23|

## Inicializando o projeto
Para inicializar o projeto, você deve executar o comando em seu terminal de preferência
```
docker-compose up -d
```

Após finalizar de subir os containers, você deve acessar o container do php através do comando `docker-compose exec php sh` e executar o arquivo **/etc/init.sh**

Feito isso, a aplicação deverá estar rodando normalmente, com acesso na porta 8000 do localhost

## MySQL Query - Teste
A query se encontra [neste arquivo](desafio_sql.sql)

## Objetivo:
Desenvolver uma ferramenta simples de cadastro de tickets para o setor de atendimento ao cliente da empresa.

## Escopo:
### 1. Criar uma tela de cadastro de tickets, onde:
- Exista um formulário para cadastrar ticket
- Campos do formulário:
	- Nome do cliente
	- E-mail
	- Número do Pedido
	- Título do ticket
	- Conteúdo do ticket

#### Observação
- Ao cadastrar um ticket:
	- Deverá existir uma validação pelo e-mail informado no formulário:
		- Se não existir:
			- Cadastrar cliente
			- Cadastra o ticket
		- Se existir:
			- Aproveitar cliente já existente
	- Deverá existir uma validação por número do pedido informado no formulário
		- Se existir para outro cliente:
			- Exibir uma mensagem de erro e não realizar o cadastro
		- Se existir para o mesmo cliente:
			- Atualizar as informações do ticket
	- Mostrar uma mensagem de sucesso após executar o cadastro na tela do formulário em branco

- Criar uma tela de relatórios de tickets, onde:
	- Exista um filtro por E-mail e Número do Pedido;
	- Exista paginação de 5 tickets por página;
	- Campos que devem ser exibidos na tela:
		- Numero do ticket;
		- Número do pedido;
		- Título do Pedido;
		- E-mail do cliente;
		- Data de criação do ticket;
- Criar tela de visualização de detalhe do ticket com todos os campos da tabela de tickets
