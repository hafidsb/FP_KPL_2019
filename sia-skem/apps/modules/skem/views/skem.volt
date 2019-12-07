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
        <div class="mb-2">
            <h2 class="d-inline">Skem</h2>
            <div class="d-inline my-1">
                <a href="/skem/create" class="btn btn-primary">Tambah Skem</a>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Lingkup</th>
                    <th scope="col">Poin</th>
                </tr>
            </thead>
            <tbody> {% for skem in skems %} <tr>
                    <th scope="row">{{ skem.namaKegiatan }}</th>
                    <td> {{ skem.jenisKegiatan }}</td>
                    <td>{{ skem.lingkup }}</td>
                    <td>
                        <form action="/skem/update/poin" class="form-group row" method="post">
                            <input type="hidden" name="id" value="{{ skem.id }}">
                            <input type="number" class="form-control col-sm-3 mx-1" name="poin"
                                placeholder="{{ skem.poin }}" value="{{ skem.poin }}">
                            <input type="submit" value="Ubah" class="btn btn-primary">
                        </form>
                    </td>
                </tr> {% endfor %} </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>