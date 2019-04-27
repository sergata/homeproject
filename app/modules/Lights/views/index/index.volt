<h1>Lights</h1>
{% for device, data in devices %}
<form method="POST">
    {{ loop.index }}. {{ device }}
    <input type="hidden" name="device" value="{{ device }}">
    {% if(data['status'] == 1 ) %}
        <input type="hidden" name="value" value="off"/>
        <input type="submit" value="swich off"/>
    {% else %}
        <input type="hidden" name="value" value="on"/>
        <input type="submit" value="turn on"/>
    {% endif %}
</form>
{% endfor %}