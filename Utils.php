<?php

class Utils {
    public function getStartNode() {
        $headers = array(
            "Content-type: text/xml",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://sakus.sakarya.bel.tr/Proxy/proxy.ashx?url=http%3A%2F%2Flocalhost%3A8080%2Fgeoserver%2Fwfs');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '<wfs:GetFeature xmlns:wfs="http://www.opengis.net/wfs" service="WFS" version="1.0.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.opengis.net/wfs http://schemas.opengis.net/wfs/1.0.0/WFS-transaction.xsd"><wfs:Query typeName="feature:BelediyeOtobus142" xmlns:feature="http://localhost:8080/SBB"><ogc:Filter xmlns:ogc="http://www.opengis.net/ogc"><ogc:BBOX><ogc:PropertyName>geom</ogc:PropertyName><gml:Box xmlns:gml="http://www.opengis.net/gml" srsName="EPSG:4326"><gml:coordinates decimal="." cs="," ts=" ">29.417417114502,40.49518108245 31.389463012938,41.038110302498</gml:coordinates></gml:Box></ogc:BBOX></ogc:Filter></wfs:Query></wfs:GetFeature>');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);

        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($output);

        return $xmlDoc->documentElement->firstChild;
    }

    public function getRoute($lineName) {
        $headers = array(
            "Content-type: text/xml",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://sakus.sakarya.bel.tr/Proxy/proxy.ashx?url=http%3A%2F%2Flocalhost%3A8080%2Fgeoserver%2Fwfs');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '<wfs:GetFeature xmlns:wfs="http://www.opengis.net/wfs" service="WFS" version="1.0.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.opengis.net/wfs http://schemas.opengis.net/wfs/1.0.0/WFS-transaction.xsd"><wfs:Query typeName="feature:HatCizim142" xmlns:feature="http://localhost:8080/SBB"><ogc:Filter xmlns:ogc="http://www.opengis.net/ogc"><ogc:And><ogc:PropertyIsEqualTo><ogc:PropertyName>nvhat_no</ogc:PropertyName><ogc:Literal>21-C</ogc:Literal></ogc:PropertyIsEqualTo><ogc:BBOX><ogc:PropertyName>geom</ogc:PropertyName><gml:Box xmlns:gml="http://www.opengis.net/gml" srsName="EPSG:4326"><gml:coordinates decimal="." cs="," ts=" ">30.04346615625,40.712298980279 30.70264584375,40.804359051503</gml:coordinates></gml:Box></ogc:BBOX></ogc:And></ogc:Filter></wfs:Query></wfs:GetFeature>');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);


        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($output);

        return $xmlDoc->documentElement->firstChild->nextSibling->firstChild->firstChild->nextSibling->firstChild->firstChild->textContent;
    }
}
