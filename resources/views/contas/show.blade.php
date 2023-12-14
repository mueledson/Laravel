<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contas - Show</title>
</head>
<body class="container">

    <a class="btn btn-dark" href="{{ route('conta.index') }}">Listar</a>

    <h2 class="mt-3">Show Contas</h2>

    @if(session('success'))
        <span style="color: #68e11f;">
            <strong>{{ session('success') }}</strong>
        </span><br>
    @endif

    <strong>ID:</strong> {{ $conta->id }}<br>
    <strong>Conta:</strong> {{ $conta->nome }}<br>
    <strong>Valor:</strong> {{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }}<br>
    <strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}<br>

    <strong>Dt.Cadastro:</strong> {{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s' )}}<br>
    <strong>Dt.Mudança:</strong> {{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s' )}}<br>

</body> 
</html>