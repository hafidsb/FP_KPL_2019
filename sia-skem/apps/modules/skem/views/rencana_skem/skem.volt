{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 pt-2 bg-white border rounded" style="margin-top: 100px !important">
    <div style="margin: 23px;">
        <div style="float: left;">
            <h2>Rencana Skem</h2>
        </div>
        <div style="display: inline; margin-left: 10px;">
                <a href="/rencana_skem/create" class="btn btn-primary">Tambah Rencana Skem</a>
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
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody> 
        {% for skem in rencanas %} 
            <tr>
                <th scope="row">{{ loop.index }}</th>
                <td scope="row">{{ skem.namaKegiatan }}</td>
                <td scope="row">{{ skem.jenisKegiatan }}</td>
                <td scope="row">{{ skem.lingkup }}</td>
                <td scope="row">{{ skem.poin }}</td>
                <td scope="row">{{ skem.deskripsi }}</td>
                <td scope="row">{{ skem.semester }}</td>
                <td scope="row">                    |
                    <a href="/rencana_skem/delete/{{ skem.id }}" class="btn btn-danger" role="button">Hapus</a>
                    |
                </td>
            </tr> 
        {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}