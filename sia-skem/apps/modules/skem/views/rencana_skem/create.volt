{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
    <h2>Buat Rencana SKEM Baru</h2>
    <form action="/rencana_skem/create" class="mt-2" method="post">
        <h4>Skem</h4>
        <select name="skem_id" class="form-control mb-1">
            {% for skem in skems %}
                <option value="{{skem.id}}">{{skem.namaKegiatan}}</option>
            {% endfor %}
        </select>
        <h4>Deskripsi</h4>
        <input type="text" class="form-control mb-3" name="deskripsi">
        <h4>Semester</h4>
        <input type="number" class="form-control mb-3" name="semester">
        <input type="submit" class="btn btn-primary"value="Buat">
    </form>
</div>
{% endblock %}