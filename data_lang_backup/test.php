<?php
// doc file XML 
$path_thanhvien = '../lang/lang.xml';
$listthanhvien = simplexml_load_file( $path_thanhvien );
echo '<pre>';
print_r($listnguoidung);
echo '</pre>';













function update_xml_id( $link_xml, $obj_key, $obj_value, $post ) {
	//Note: nếu chỉ đọc XML thì dùng Simple load XML
	// nếu có tác động đến dữ liệu XML thì phải dùng: DOMDocument
	// tạo link dẫn đến XML
	$path_listuser = $link_xml;
	// tạo đối tượng DOMDocument
	$doc = new DOMDocument();
	//tải toàn bộ nội dung XML vào đối tượng $doc
	$doc->load( $path_listuser );
	// tìm root trong đối tượng $doc
	$root = $doc->documentElement;
	// lấy danh sách root ra 
	$nodecantim = "";
	$listnodenguoidung = $root->childNodes;
	foreach ( $listnodenguoidung as $node ) {
		if ( $node->nodeType == XML_ELEMENT_NODE ) {
			$nodethuoctinhs = $node->childNodes;
			foreach ( $nodethuoctinhs as $nodethuoctinh ) {
				if ( $nodethuoctinh->nodeType == XML_ELEMENT_NODE ) {
					if ( $nodethuoctinh->nodeName == $obj_key && $nodethuoctinh->nodeValue == $obj_value ) {

						foreach ( $post as $k => $v ) {

							$node->getElementsByTagName( $k )->item( 0 )->nodeValue = $v;
							if ( $k == 'mk_dangnhap_nguoidung' ) {

								$node->getElementsByTagName( $k )->item( 0 )->nodeValue = md5( $v );
							}
						}
						$doc->save( $path_listuser );
					}
				}
			}
		}


	}
}


?>
