<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar empresa {{$empresa->title}}</title>
    <link href="{{ asset('css/master.css')}}" rel="stylesheet">
</head>
<body>



<form class="form" action=" {{ route('atualizar_empresa', ['id' => $empresa->id]) }}" method="post">
    @csrf
    <h1>Edição da empresa {{$empresa->title}}</h1>
    <div class="edit">
        <label for="TITLE">Nome da Empresa</label>
        <input class="input-type" type="text" name="TITLE" id="TITLE" value="{{ $empresa->title }}"></div>
    <div class="edit">
        <label for="NAME">Nome da Contato</label>
        <input class="input-type" type="text" name="NAME" id="NAME" value="{{ $contato->name }}"></div>
    <div class="edit">
        <label for="LAST_NAME">Sobrenome do Contato</label>
        <input class="input-type" type="text" name="LAST_NAME" id="LAST_NAME" value="{{ $contato->last_name }}"></div>
    <div class="edit">
        <label for="EMAIL">Email</label>
        <input class="input-type" type="email" name="EMAIL" id="EMAIL" value="{{ $contato->email }}"></div>
    <div class="edit">
        <label for="CITY">Cidade</label>
        <input class="input-type" type="text" name="CITY" id="CITY" value="{{ $empresa->city }}"></div>
    <div class="edit">
        <label for="ADDRESS_PROVINCE">Estado</label>
        <input class="input-type" type="text" name="ADDRESS_PROVINCE" id="ADDRESS_PROVINCE" value="{{ $empresa->state }}">
    </div><br>
    <button class="button-text" type="submit">Salvar</button>
</form>


</body>
</html>
