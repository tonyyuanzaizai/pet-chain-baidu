<?php
// 4 拆分svg 节点
// 狗狗由8部分组成，svg 有8个节点

set_time_limit(0); 


function svg2gnode($xml_file){
	

	$doc = new DOMDocument();
	$doc->load($xml_file);
	
	
	if($doc->childNodes instanceof DOMNodeList ){
		//echo ' ccc ' . $doc->childNodes->length . ' ' ;
		//echo "</br>";
		$data = $doc->childNodes->item(0);
		//echo ' ddd ' . $data->childNodes->length . ' ' ;
		//echo "</br>";
		//exit(0);
		for( $i=0; $i< $data->childNodes->length; $i++){
			$dataChild = $data->childNodes->item($i);
			$dataChildType = $dataChild->nodeType . ' ';
			
			//echo ' aaa ' . $dataChildType . ' ' ;
			//echo "</br>";
			
			if($dataChild instanceof DOMNode && $dataChildType == 1){//achievement ,arena_support
				if($dataChild->hasChildNodes()){
					//echo 'aaa:'. $dataChild->tagName  . ' '. $dataChild->getAttribute("id");
					//echo "</br>";
					
					$attributeId = $dataChild->getAttribute("id");
					
					if('eye' == $dataChild->getAttribute("id")){
						for($j=0; $j< $dataChild->childNodes->length; $j++){
							$dataChild2 = $dataChild->childNodes->item($j);
							$dataChildType2 = $dataChild2->nodeType . ' ';
							if($dataChild2 instanceof DOMNode && $dataChildType2 == 1){
								//echo 'bbbb:'. $dataChild2->tagName  . ' '. $dataChild2->getAttribute("id");
								//echo "</br>";
								//writeSvgGNode($dataChild2);
								writeSvgGNodeSVG($dataChild);
							}
						}						
					}
					else {
						// TODO write node:dataChild
						//$txt_file = './' . $attributeId . '.g'; 
						//$xml = $dataChild->ownerDocument->saveXML($dataChild);
						//file_put_contents($txt_file,       $xml);
						//writeSvgGNode($dataChild);
						writeSvgGNodeSVG($dataChild);
					}
				}
			}
			
		}
	}	
}


function writeSvgGNode($gNode){
	$attributeId = $gNode->getAttribute("id");
	$txt_file = './' . $attributeId . '.g'; 
	$xml = $gNode->ownerDocument->saveXML($gNode);
	file_put_contents($txt_file,       $xml);
}

function writeSvgGNodeSVG($gNode){
	$attributeId = $gNode->getAttribute("id");
	$txt_file = './' . $attributeId . '.svg'; 
	$xml = $gNode->ownerDocument->saveXML($gNode);
	file_put_contents($txt_file,      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 480">'.  $xml . '</svg>');
}


$xml_file = '19.svg';
svg2gnode($xml_file);


?>