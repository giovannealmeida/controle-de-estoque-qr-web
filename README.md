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
## Estados

Retorna informações do estado por id, nome, uf, id da cidade ou todos os estados

Método: GET
URL: base_url + /api/States_controller
Parâmetro: "id" para estado por id, "name" para estado por nome, "uf" para estado por uf,  "city_id" para estado por cidade e nada para retornar todas as cidades
Retorno: id, name, uf. Array quando o parâmetro for diferente de "id"

#Etapas do cadastro de usuário

- Validação do email

Descrição: Verifica se o email já está cadastrado no sistema
Método: GET
URL: base_url + /api/Login_controller/email_check
Parâmetro: email
Retorno: status, "true" para já cadastrado, "false" para ainda não cadastrado

- Validação do CPF

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
