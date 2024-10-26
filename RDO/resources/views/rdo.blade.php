
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar RDO</title>
    <style>
        /* Estilos da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #1f253d;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        .form-box {
            background-color: #2b3654;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.5);
            width: 400px;
        }
        .form-box input, .form-box select {
            width: 100%;
            padding: 10px;
            margin: 30px 0;
            border: none;
            border-radius: 4px;
        }
        .form-box .actions {
            display: flex;
            justify-content: space-between;
        }

        .form-box .btn-cancel {
            background-color: #FF0000;
            border: none;
            color: white; 
            /* este é sobre o botão cancelar */
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-box .btn-generate {
            background-color: #08FF00;
            border: none;
            color: white;
            /* esse e sobre o botão gerar */
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Gerar RDO</h2>
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ url('/rdo/gerar') }}" method="POST">
            @csrf <!-- Token de segurança obrigatório para formulários POST no Laravel -->
            
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" placeholder="Número do último + 1" required>
            
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
            
            <label for="obra">Obra:</label>
            <select id="obra" name="obra" required>
                <option value="">Selecione a obra</option>
                <option value="Obra 1">Obra 1</option>
                <option value="Obra 2">Obra 2</option>
                <option value="Obra 3">Obra 3</option>
            </select>
            
            <div class="actions">
                <button type="button" class="btn-cancel" onclick="window.location.href='/rdo';">CANCELAR</button>
                <button type="submit" class="btn-generate">GERAR</button>
            </div>
        </form>
    </div>
</body>
</html>