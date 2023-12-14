<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contas - Create</title>
</head>
<body class="container">

    <a class="btn btn-warning mt-2" href="{{ route('conta.index') }}">Voltar</a>

    <h2 class="mt-3">Crie uma Nova Conta</h2>

    @if($errors->any())
        <span class="link link-danger" style="text-decoration: none;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
    @endif

    <form action="{{ route('conta.store') }}" method="POST">
        @csrf

        <label for="nome">Nome da Conta:</label>
        <input class="form-control mb-3" type="string" name="nome" id="nome" placeholder="Digite o Nome da Conta ex: Talão de Energia" value="{{old('nome')}}"/>
        
        <label for="valor">Valor da Conta:</label>
        <input class="form-control mb-3" type="string" name="valor" id="valor" placeholder="Use '.' para separar reais e" value="{{old('valor')}}"/>

        <label for="vencimento">Data de Vencimento:</label>
        <input class="form-control mb-3" type="date" name="vencimento" id="vencimento" value="{{old('vencimento')}}"/>

        <button type="submit" class="btn btn-success">Cadastrar</button>

    </form>
    
</body> 
</html>