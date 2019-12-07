<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="#">Sia Skem</a>
    </nav>
    <div class="container mt-5 pt-2">
        <h2>Skem</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Lingkup</th>
                    <th scope="col">Poin</th>
                </tr>
            </thead>
            <tbody>
            {% for skem in skems %}
                <tr>
                    <th scope="row">{{ skem.namaKegiatan }}</th>
                    <td> {{ skem.jenisKegiatan }}</td>
                    <td>{{ skem.lingkup }}</td>
                    <td>{{ skem.poin }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>