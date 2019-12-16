{% extends 'navbar.volt' %}

{% block content %}
<div class="container mt-5 p-3 border rounded bg-white" style="margin-top: 100px !important">
<h2>Login Biro Kemahasiswaan</h2>
    <form action="/user/biro-kemahasiswaan/login" class="mt-2" method="post">
        <h4>Username</h4>
        <input type="text" class="form-control mb-1" name="username" id="">
        <h4>Password</h4>
        <input type="text" class="form-control mb-1" name="password" id="">
        <input type="submit" class="btn btn-primary"value="Login">
    </form>
</div>
</div>
{% endblock %}