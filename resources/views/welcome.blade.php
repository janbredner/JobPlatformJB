<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">

    <h1>Vue.js Tests</h1>
        <div id="app">
            <h2>Component Tests</h2>
                <h3>Nested Test</h3>
                    <nested-test></nested-test>

                <h3>Probs Test</h3>
                    <probs-test content-test="probsTestItem Nr1"></probs-test>
                    <probs-test content-test="probsTestItem Nr2"></probs-test>
                    <probs-test content-test="probsTestItem Nr3"></probs-test>

                <h3>clickerComponent</h3>
                    <clicker></clicker>
                    <clicker></clicker>
                    <clicker></clicker>
            <h2>API Tests</h2>
                <h3>load Data from api</h3>
                    <example-component></example-component>
        </div>
        <script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
