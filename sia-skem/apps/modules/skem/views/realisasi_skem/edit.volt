{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
    <h2>Ubah Realisasi SKEM</h2>
    <form action="/realisasi_skem/edit/{{ realisasi.id }}" class="mt-2" method="post">
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
        <input type="text" class="form-control mb-3" name="deskripsi" id="" value="{{ realisasi.deskripsi }}">
        <h4>Semester</h4>
        <select name="semester">
            <option selected=selected value="{{ realisasi.semester }}">{{ realisasi.semester }}(tetap)</option>
            {% for i in semester %}
                {% if i != realisasi.semester %}
                    <option value="{{ loop.index }}">{{ loop.index }}</option>
                {% endif %}
            {% endfor%}
        </select>
        <h4>Tanggal Pelaksanaan</h4>
        <input type="date" class="form-control mb-3" name="tanggal" id="" value="{{ realisasi.tanggal }}">
        <input type="submit" class="btn btn-primary"value="Ubah">
    </form>
</div>
{% endblock %}