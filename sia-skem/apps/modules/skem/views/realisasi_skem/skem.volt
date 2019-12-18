{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 pt-2 bg-white border rounded" style="margin-top: 100px !important">
    <div style="margin: 23px;">
        <div style="float: left;">
            <h2>Realisasi Skem</h2>
        </div>
        <div style="display: inline; margin-left: 10px;">
                <a href="/realisasi_skem/create" class="btn btn-primary">Tambah Realisasi Skem</a>
            </div>
        <div style="float: right;">
            <h5>Cari Realisasi Skem Berdasarkan Semester </h5>
            <form action="/realisasi_skem/semester" method="post">
                <select name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Cari">
            </form>            
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Jenis Kegiatan</th>
                <th scope="col">Lingkup</th>
                <th scope="col">Poin</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Semester</th>
                <th scope="col">Status Validasi</th>
                <th scope="col">Tanggal Pelaksanaan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody> 
        {% for skem in realisasi %} 
            <tr>
                <th scope="row">{{ loop.index }}</th>
                <td scope="row">{{ skem.namaKegiatan }}</td>
                <td scope="row">{{ skem.jenisKegiatan }}</td>
                <td scope="row">{{ skem.lingkup }}</td>
                <td scope="row">{{ skem.poin }}</td>
                <td scope="row">{{ skem.deskripsi }}</td>
                <td scope="row">{{ skem.semester }}</td>
                {% if skem.tervalidasi is false %}
                    <td scope="row">Belum Tervalidasi</td>
                {% else %}
                    <td scope="row">Tervalidasi</td>
                {% endif%}
                <td scope="row">{{ skem.tanggal }}</td>
                <td scope="row" style="width: 100%;">
                    <a href="/realisasi_skem/edit/{{ skem.id }}" class="btn btn-primary" role="button">Ubah</a>
                    |
                    <a href="/realisasi_skem/delete/{{ skem.id }}" class="btn btn-danger" role="button">Hapus</a>
                    |
                    <a href="/realisasi_skem/validasi/{{ skem.id }}" type="button" class="btn btn-success">Validasi Skem</a>
                </td>
            </tr> 
        {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}