<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">
    <div class="row">
        <div class="d-flex flex-row mt-4">

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">Основные (Fundamental)
                                <a href="/fundamentals/property-container" class="nav-link">Контейнер свойств (Property container)</a>
                                <a href="/fundamentals/delegation" class="nav-link">Делегирование (Delegation)</a>
                            </li>
                            <li class="nav-item">Порождающие шаблоны (Creational)</li>
                            <li class="nav-item">Структурные шаблоны (Structural)</li>
                            <li class="nav-item">Поведенческие шаблоны (Behavioral)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="jumbotron">
                    <h1>{{ $name }}</h1>
                    <p class="lead">Шаблон проектирования</p>
                </div>

                <div class="card text-center">
                    {!! $description !!}

                    @isset($item)
                        <div class="text-justify" style="margin: 50px 20px">
                            @php
                                /** @var $item */
                                dump($item)
                            @endphp
                        </div>
                    @endisset

                </div>

                <div class="card text-justify mt-4">
                    {!! $faq !!}
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
