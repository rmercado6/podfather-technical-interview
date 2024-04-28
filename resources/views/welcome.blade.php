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
                .then(data => {
                    new Chart(
                        document.getElementById('waste-chart'),
                        {
                            type: 'bar',
                            data: {
                                labels: data.map(row => row.customer.name + row.year),
                                datasets: [
                                    {
                                        label: 'Waste by year',
                                        data: data.map(row => row.actual_quantity)
                                    }
                                ]
                            }
                        }
                    );
                });
        }
        x();
    </script>

    <!-- Stylesheet -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen w-screen max-h-screen max-w-screen scroll-auto bg-slate-100 flex justify-center items-center p-12">
<div class="flex flex-col bg-white grow h-full rounded-3xl items-center justify-center p-12 shadow-2xl">
    <div class="flex w-full py-12 px-6 items-start gap-6">
        <h1 class="text-6xl font-bold grow">Customer Waste</h1>
        <label class="flex flex-col">
            Customer
            <select>
                <option>Test</option>
            </select>
        </label>
        <label class="flex flex-col">
            Site
            <select>
                <option>Test</option>
            </select>
        </label>
        <label class="flex flex-col">
            Month
            <select>
                <option>Test</option>
            </select>
        </label>
        <label class="flex flex-col">
            Year
            <select>
                <option>Test</option>
            </select>
        </label>
        <label class="flex flex-col">
            Waste Type
            <select>
                <option>Test</option>
            </select>
        </label>
    </div>
    <div class="bg-white w-full"><canvas id="waste-chart"></canvas></div>
</div>
</body>

</html>
