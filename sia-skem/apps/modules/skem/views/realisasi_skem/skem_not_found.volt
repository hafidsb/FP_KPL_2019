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
            <h5>Cari Skem Berdasarkan Semester </h5>
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
            <tr style="width: 100%;">
                <th style="width: 50%; margin: 0 auto;" scope="row">Data Realisasi Skem Tidak Ditemukan</th>
            </tr>
        </tbody>
    </table>
</div>
{% endblock %}