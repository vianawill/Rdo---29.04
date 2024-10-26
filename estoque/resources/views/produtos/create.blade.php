<!DOCTYPE html>
<html>
    <head>
        <title>Criar Produtos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="styleshhet">
        
        <!-- Bootstrap JS (opcional) -->
        <script src="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <h1>Criar Produto</h1>
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <label>Código do Produto:</label>
            <input type="text" name="cod_prod" required>
            <br>
            <label>Nome:</label>
            <input type="text" name="nome" required>
            <br>
            <label>Validade:</label>
            <input type="date" name="validade">
            <br>
            <label>Peso:</label>
            <input type="text" name="peso" required>
            <br>
            <label>Tamanho:</label>
            <input type="text" name="tamanho" required>
            <br>
            <label>Preço:</label>
            <input type="text" name="preco" required>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>