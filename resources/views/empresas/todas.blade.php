<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todas as empresas</title>
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script scr="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script scr="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>

<h1>Lista de Empresas e seus Contatos</h1>
<table id="list">
    <thead>
    <tr>
        <th class="c1">Nome da Empresa</th>
        <th class="c2">Cidade</th>
        <th class="c3">Estado</th>
        <th class="c4">Nome do Contato</th>
        <th class="c5">Sobrenome do Contato</th>
        <th class="c6">Email do Contato</th>
        <th class="c7">Edição</th>
        <th class="c8">Exclusão</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $lista)
        <tr>
            <td>{{ $lista->title }}</td>
            <td>{{ $lista->city }}</td>
            <td>{{ $lista->state }}</td>
            <td>{{ $lista->name }}</td>
            <td>{{ $lista->last_name }}</td>
            <td>{{ $lista->email }}</td>
            <td><a href="{{ route('editar_empresa', ['id' => $lista->id]) }}" title="Editar empresa {{ $lista->id }}">Editar</a></td>
            <td><a href="{{ route('excluir_empresa', ['id' => $lista->id]) }}" title="Excluir empresa {{ $lista->id }}">Excluir</a></td>
        </tr>
    @endforeach
    </tbody>

</table>




</body>
</html>
