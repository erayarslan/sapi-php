<?php

class Utils {
    public function getStartNode() {
        $headers = array(
            "Content-type: text/xml",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://sakus.sakarya.bel.tr/Proxy/proxy.ashx?url=http%3A%2F%2Flocalhost%3A8080%2Fgeoserver%2Fwfs');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "<wfs:GetFeature xmlns:wfs=\"http://www.opengis.net/wfs\" service=\"WFS\" version=\"1.0.0\" xsi:schemaLocation=\"http://www.opengis.net/wfs http://schemas.opengis.net/wfs/1.0.0/WFS-transaction.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"><wfs:Query typeName=\"feature:BelediyeOtobus\" xmlns:feature=\"http://localhost:8080/SBB\"><ogc:Filter xmlns:ogc=\"http://www.opengis.net/ogc\"><ogc:BBOX><ogc:PropertyName>GEOM</ogc:PropertyName><gml:Box xmlns:gml=\"http://www.opengis.net/gml\" srsName=\"EPSG:4326\"><gml:coordinates decimal=\".\" cs=\",\" ts=\" \">16.310555999999,37.476290486075 44.435555999999,44.000366126517</gml:coordinates></gml:Box></ogc:BBOX></ogc:Filter></wfs:Query></wfs:GetFeature>");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);

        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($output);

        return $xmlDoc->documentElement->firstChild;
    }
}
