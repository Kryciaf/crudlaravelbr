<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/master.css')}}" rel="stylesheet">
    <title>Cadastrar nova empresa</title>
</head>
<body>
<div class="container">
    <div class="form">
        <form action="{{ route('salvar_empresa') }}" method="post">
            @csrf
            <div class="form-hearder">
                <div class="title">
                    <h1>Cadastro de Empresa</h1>
                </div>

            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="TITLE">Nome da Empresa</label>
                    <input type="text" name="TITLE" id="TITLE" placeholder="Digite aqui o nome da empresa" required>
                </div>

                <div class="input-box">
                    <label for="NAME">Nome do Contato</label>
                    <input type="text" name="NAME" id="NAME" placeholder="Nome de um contato da empresa" required>
                </div>

                <div class="input-box">
                    <label for="LAST_NAME">Sobrenome do Contato</label>
                    <input type="text" name="LAST_NAME" id="LAST_NAME" placeholder="Sobrenome do contato" required>
                </div>

                <div class="input-box">
                    <label for="EMAIL">Email</label>
                    <input type="email" name="EMAIL" id="EMAIL" placeholder="Email do contato" required>
                </div>

                <div class="input-box">
                    <label for="ADDRESS_CITY">Cidade</label>
                    <input type="text" name="ADDRESS_CITY" id="ADDRESS_CITY" placeholder="Cidade em que fica localizada a empresa" required>
                </div>

                <div class="input-box">
                    <label for="ADDRESS_PROVINCE">Estado</label>
                    <input type="text" name="ADDRESS_PROVINCE" id="ADDRESS_PROVINCE" placeholder="Estado em que fica localizada a empresa" required>
                </div>

            </div>
            <div class="button">
                <button class="button-text" type="submit">Salvar</button>
            </div>
        </form>

        <a href="http://localhost/crud/public/empresas/list">Listagem das Empresas Cadastradas</a>

    </div>

</div>
</body>
</html>
