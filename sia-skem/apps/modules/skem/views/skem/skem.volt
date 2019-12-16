{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 pt-2 bg-white border rounded" style="margin-top: 100px !important">
    <div class="mb-2 row">
        <h2 class="col-1">Skem</h2>
        <div class="col-2">
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
        <tbody> 
        {% for skem in skems %} 
            <tr>
                <th scope="row">{{ skem.namaKegiatan }}</th>
                <td> {{ skem.jenisKegiatan }}</td>
                <td>{{ skem.lingkup }}</td>
                <td>
                    <form action="/skem/poin" class="form-group row" method="post">
                        <input type="hidden" name="id" value="{{ skem.id }}">
                        <input type="number" class="form-control col-sm-3 mx-1" name="poin"
                            placeholder="{{ skem.poin }}" value="{{ skem.poin }}">
                        <input type="submit" value="Ubah" class="btn btn-primary">
                    </form>
                </td>
            </tr> 
        {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}