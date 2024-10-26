<!DOCTYPE html>
<html>
    <head>
        <title>Editar Produto</title>

        <!-- Fonts -->
        <link href="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap JS (opcional) -->
        <script src="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <h1>Editar Produtos</h1>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csfr
            @method('PUT')
            <label>Código do Produto:</label>
            <input type="text" name="cod_prod" value="{{ $produto->cod_prod }}" required>
            <br>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $produto->nome }}" required>
            <br>
            <label>Validade:</label>
            <input type="date" name="validade" value="{{ $produto->validade }}">
            <br>
            <label>Peso:</label>
            <input type="text" name="peso" value="{{ $produto->peso }}" required>
            <br>
            <label>Tamanho:</label>
            <input type="text" name="tamanho" value="{{ $produto->tamanho }}" required>
            <br>
            <label>Preço:</label>
            <input type="text" name="preco" value="{{ $produto->nome }}" required>
            <br>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>