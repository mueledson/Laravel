<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contas - Edit</title>
</head>
<body class="container">

    <a class="mt-5 btn btn-dark" href="{{ route('conta.index') }}">Listar</a>
    <a class="mt-5 btn btn-dark" href="{{ route('conta.show', ['conta' => $conta->id ])}}">Visualizar Conta</a>

    <h2 class="mt-3">Editar a Conta</h2>

    @if($errors->any())
        <span class="link link-danger" style="text-decoration: none;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
    @endif

    <form action="{{ route('conta.update', ['conta' => $conta->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome da Conta:</label>
        <input class="form-control mb-3" type="string" name="nome" id="nome" placeholder="Digite o Nome da Conta ex: Talão de Energia" value='{{ old("nome", "$conta->nome") }}'/>
        
        <label for="valor">Valor da Conta:</label>
        <input class="form-control mb-3" type="string" name="valor" id="valor" placeholder="Use '.' para separar reais e" value='{{old("valor", "$conta->valor")}}'/>

        <label for="vencimento">Data de Vencimento:</label>
        <input class="form-control mb-3" type="date" name="vencimento" id="vencimento" value='{{old("vencimento", "$conta->vencimento")}}'/>

        <button type="submit" class="btn btn-success">Editar</button>

    </form>

</body> 
</html>