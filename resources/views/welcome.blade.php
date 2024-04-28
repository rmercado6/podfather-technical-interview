<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel Project</title>

    <script>
        let x = async () => {
            await fetch('/waste')
                .then(response => response.json())
                .then(data => console.log(data));
        }
    </script>

    <!-- Stylesheet -->
    @vite('resources/css/app.css')
</head>

<body>
<div class="bg-red-400" onclick="x()">Test</div>
</body>

</html>
