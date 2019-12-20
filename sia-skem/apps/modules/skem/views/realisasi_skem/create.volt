{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
    <h2>Buat Realisasi SKEM Baru</h2>
    <form action="/realisasi_skem/create" class="mt-2" method="post">
        <h4>Jenis Skem</h4>
        <select name="skemId">
            {% for skem in skems %}
                <option value="{{ skem.id }}">
                        {{ skem.namaKegiatan }} --
                        {{ skem.jenisKegiatan }} --
                        {{ skem.lingkup }}
                </option>
            {% endfor %}
        </select>
        <h4>Deskripsi</h4>
        <input type="text" class="form-control mb-3" name="deskripsi" id="">
        <h4>Semester</h4>
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
        <h4>Tanggal Pelaksanaan</h4>
        <input type="date" class="form-control mb-3" name="tanggal" id="">
        <input type="submit" class="btn btn-primary"value="Buat">
    </form>
</div>
{% endblock %}