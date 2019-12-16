{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
    <h2>Ubah Realisasi SKEM</h2>
    <form action="/realisasi_skem/edit/{{ realisasi.id }}" class="mt-2" method="post">
        <h4>Nama Kegiatan</h4>
        <input type="text" class="form-control mb-1" name="nama_kegiatan" id="" value="{{ realisasi.namaKegiatan }}">
        <h4>Jenis Kegiatan</h4>
        <input type="text" class="form-control mb-1" name="jenis_kegiatan" id="" value="{{ realisasi.jenisKegiatan }}">
        <h4>Lingkup</h4>
        <input type="text" class="form-control mb-1" name="lingkup" id="" value="{{ realisasi.lingkup }}">
        <h4>Poin</h4>
        <input type="number" class="form-control mb-3" name="poin" id="" value="{{ realisasi.poin }}">
        <h4>Deskripsi</h4>
        <input type="text" class="form-control mb-3" name="deskripsi" id="" value="{{ realisasi.deskripsi }}">
        <h4>Semester</h4>
        <input type="number" class="form-control mb-3" name="semester" id="" value="{{ realisasi.semester }}">
        <h4>Tanggal Pelaksanaan</h4>
        <input type="date" class="form-control mb-3" name="tanggal" id="" value="{{ realisasi.tanggal }}">
        <input type="submit" class="btn btn-primary"value="Ubah">
    </form>
</div>
{% endblock %}