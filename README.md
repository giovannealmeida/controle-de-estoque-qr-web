# API - Sistema de Controle de Estoque

## Cidades [GET /api/Cities_controller]

Retorna informações da cidade por id, nome, id do estado ou todas as cidades.

Parâmetros:

* ```"id"``` para busca de cidade por id  
* ```"name"``` para busca de cidade por nome  
* ```"state_id"``` para busca de cidade por estado  
* nada para retornar todas as cidades

Retorno:

* Objeto

``` json
{
  "status":true,
  "message":"",
  "data":
    {
      "id":1,
      "state_id":1,
      "name":"Cidade",
      "latitude":1,
      "longitude":1
    }
}
```

* Array

``` json
{
  "status":true,
  "message":"",
  "data": [
    {
      "id":1,
      "state_id":1,
      "name":"Cidade 1",
      "latitude":1,
      "longitude":1
    },
    {
      "id":2,
      "state_id":1,
      "name":"Cidade 2",
      "latitude":2,
      "longitude":2
    }]
}
```

## Estados [GET /api/States_controller]

Retorna informações do estado por id, nome, uf, id da cidade ou todos os estados

Parâmetros:

* ```"id"``` para estado por id  
* ```"name"``` para estado por nome  
* ```"uf"``` para estado por uf  
* ```"city_id"``` para estado por cidade  
* nada para retornar todas as cidades

Retorno:

* Objeto

``` json
{
  "status":true,
  "message":"",
  "data":
    {
      "id":1,
      "name":"Estado",
      "uf":"UF"
    }
}
```

* Array

``` json
{
  "status":true,
  "message":"",
  "data":[
    {
      "id":1,
      "name":"Estado",
      "uf":"UF"
    },
    {
      "id":2,
      "name":"Estado2",
      "uf":"UF2"
    }]
}
```

## Etapas do cadastro de usuário

### Validação do email [GET /api/Login_controller/email_check]

Verifica se o email já está cadastrado no sistema

Parâmetros:

* ```"email"```

Retorno:

Status ```true``` para e-mail cadastrado e ```false``` para e-mail não cadastrado.

``` json
{
  "status":true,
  "message":"",
}
```

## Validação do CPF

Descrição: Verifica se o cpf é válido
Método: GET
URL: base_url + /api/Login_controller/cpf_sum
Parâmetro: cpf
Retorno: status, "true" quando for válido, "false" quando for inválido e message

Descrição: Verifica se o cpf já está cadastrado no sistema
Método: GET
URL: base_url + /api/Login_controller/cpf_check
Parâmetro: cpf
Retorno: status, "true" para já cadastrado, "false" para ainda não cadastrado

- Cadastro de usuário

Descrição: Efetua o cadastro do usuário
Método: POST
URL: base_url + /api/Login_controller/register
Parâmetro: name, email, password, birthday, gender_id, phone, cpf
Retorno: status, "true" se cadastrado com sucesso, "false" se houve falha ao cadastrar, se o cadastro for efetuado com sucesso vai retornar data{userData{id, avatar, name, email, password, birthday, gender_id, cpf, phone e level_id}, key}


# Login


Descrição: Efetua o login
Método: POST
URL: base_url + /api/Login_controller
Parâmetro: email e password
Retorno: status, "true" se logado com sucesso, "false" se houve falha ao logar, se o login for retornado com sucesso vai retornar data{userData{id, avatar, name, email, password, birthday, gender_id, cpf, phone e level_id}, key}

# Logout

Descrição: Sair do sistema
Método: GET
URL: base_url + /api/Login_controller/logout
Retorno: status, "true" se logout com sucesso, "false" se houve falha no logout

# Recuperar senha

Descrição: Envia email para o usuário com hash
Método: POST
URL: base_url + /api/Login_controller/forgot_password_send_hash
Parâmetro: email
Retorno: status, "true" se email enviado com sucesso, "false" se houve falha ao enviar email

- Obter usuário

Descrição: Recupera dados do usuário
Método: GET
URL: base_url + /api/User_controller
Parâmetro: id
Retorno: se não existir retorna null, se existir retorna id, avatar, name, email, password, birthday, gender_id, cpf, phone e level_id


## Produtos [GET /api/Estoque_controller]

Retorna informações do produto pelo código

Parâmetros:

* ```"code"``` para busca de produtos pelo código

Retorno:

* Array

``` json
[
    {
        "id": "12",
        "code": "2147483647",
        "product_name": "Brinco top ",
        "description": "Brinco de perola brilhante",
        "quantity_in_stock": "59",
        "wholesale_value": "R$ 120.00",
        "retail_value": "R$ 150.00",
        "status": "Estoque"
    }
]
```


## Clientes [POST /api/Cliente_controller]

cadastra um novo Cliente

Parâmetros:

* ```"name"```Nome completo do cliente (obrigatório)
* ```"email"```Email do cliente (Opcional)
* ```"gender_id"```Id do gênero do cliente (obrigatório)
* ```"gender_id"```Id do gênero do cliente (obrigatório)
* ```"phone"```Telefone do cliente (obrigatório)
* ```"ciyt_id"```Id da cidade do cliente (obrigatório)

Retorno:

* Objeto

``` json
{
    "status": true,
    "message": "Customer successfully registered"
}
```
