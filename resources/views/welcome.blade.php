<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Simples</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">API Simples - Clientes, Produtos e Vendas</h1>

        <button onclick="fetchData('clientes')" class="bg-blue-500 text-white px-4 py-2 mb-4 rounded">Listar Clientes</button>


        <button onclick="fetchData('clientes/10101010101')" class="bg-green-500 text-white px-4 py-2 mb-4 rounded">Buscar Cliente 2</button>

        <button onclick="fetchData('produtos')" class="bg-indigo-500 text-white px-4 py-2 mb-4 rounded">Listar Produtos</button>

        <button onclick="fetchData('vendas')" class="bg-red-500 text-white px-4 py-2 mb-4 rounded">Listar Vendas</button>

        <div id="result" class="mt-6 p-4 bg-white border rounded shadow-md"></div>
    </div>

    <script>
        function fetchData(endpoint) {
            fetch(`http://127.0.0.1:8000/api/${endpoint}`)
                .then(response => response.json())
                .then(data => {
                    let resultHTML = '';

                    if (Array.isArray(data)) {
                        data.forEach(item => {
                            for (const [key, value] of Object.entries(item)) {
                                resultHTML += `<p><strong>${key}:</strong> ${value}</p>`;
                            }
                            resultHTML += '<hr class="my-2">';
                        });
                    } else {
                        for (const [key, value] of Object.entries(data)) {
                            resultHTML += `<p><strong>${key}:</strong> ${value}</p>`;
                        }
                    }

                    document.getElementById('result').innerHTML = resultHTML;
                })

                .catch(error => {
                    document.getElementById('result').innerHTML = 'Erro: ' + error;
                });
        }
    </script>
</body>

</html>