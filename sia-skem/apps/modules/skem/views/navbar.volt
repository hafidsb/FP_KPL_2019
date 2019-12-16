<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sistem Informasi Akademik SKEM</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="/">Sia Skem</a>
        <a class="navbar-brand font-weight-bold" href="/realisasi_skem/">Realisasi Skem</a>
        <a class="navbar-brand font-weight-bold" href="/skem/guide">Petunjuk Teknis</a>
    </nav>
    <div class="popup" style="z-index:9999 !important;position: fixed; transform: translate(-60%, 0); left: 45%;">
        <?php $this->flashSession->output() ?>
    </div>

    {% block content %}{% endblock %}
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script>
        $(function() {
            setTimeout(function() {
                $('.popup').hide("slow");
            }, 1500);
        })
    </script>
</body>

</html>