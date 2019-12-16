{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
    <h2>Buat SKEM Baru</h2>
    <form action="/skem/create" class="mt-2" method="post">
        <h4>Nama Kegiatan</h4>
        <input type="text" class="form-control mb-1" name="nama_kegiatan" id="">
        <h4>Jenis Kegiatan</h4>
        <input type="text" class="form-control mb-1" name="jenis_kegiatan" id="">
        <h4>Lingkup</h4>
        <input type="text" class="form-control mb-1" name="lingkup" id="">
        <h4>Poin</h4>
        <input type="number" class="form-control mb-3" name="poin" id="">
        <input type="submit" class="btn btn-primary"value="Buat">
    </form>
</div>
{% endblock %}