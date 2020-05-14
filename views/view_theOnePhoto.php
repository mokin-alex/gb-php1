<?php
//ВЬЮШКА ДЛЯ ПРОДУКТА ОДНОГО
echo '<img width=400 src="data:' . $photo['imageType'] . ';base64,'.base64_encode( $photo['imageData'] ).'"/>';