<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<title>Пример API Карт Google на языке JavaScript </title>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDdOgLPCjwVvragEfq7JPt0Z6WExirLDDk"

type="text/javascript"></script>

<script type="text/javascript">

function initialize() {if (GBrowserIsCompatible()) {

var map = new GMap2(document.getElementById("map_canvas"));

map.setCenter(new GLatLng(56.32811,44.0), 10);map.addControl(new GLargeMapControl());

map.addControl(new GMapTypeControl());

}}


</script></head>

<body onload="initialize()" onunload="GUnload()">

<div id="map_canvas" style="width: 500px; height: 300px"></div>

</body>

</html>