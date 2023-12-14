<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contas</title>
</head>
<body class="container">

    <a class="btn btn-success mt-3" href="{{ route('conta.create') }}">Cadastrar</a>

    <h2 class="mt-3 mb-5 text-center ">Listar as Contas</h2>
    
    @if(session("success"))
        <span class="link link-success" style="text-decoration: none;">
            {{ session("success") }}<br>
        </span>
    @endif

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contas as $conta)
                    
                <tr>
                    <td>{{ $conta->id }}</td>
                    <td>{{ $conta->nome }}</td>
                    <td>{{ 'R$' . number_format($conta->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                    <td style="display: flex; gap: 5px;">
                        <a class="btn btn-primary" href="{{ route('conta.show', ['conta' => $conta->id ])}}"> <i class="fa-solid fa-eye"></i> </a>
                        <a class="btn btn-warning" href="{{ route('conta.edit', ['conta' => $conta->id ])}}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                        <form action="{{ route('conta.destroy', ['conta' => $conta->id ])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que quer apagar essa conta?')"><i class="fa-solid fa-trash"></i></button>
                        </form>  
                    </td>
                </tr>

                    
            @empty
                <p class="h4 text-center mt-5" style="color: #F00;">Nenhuma conta encontrada!</p>
            @endforelse
        </tbody>
    </table>
</body> 
</html>