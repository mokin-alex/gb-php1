<?php
//ВЬЮШКА ДЛЯ ГАЛЛЕРЕИ: вывод данных изображения взятого из blob базы данных
echo '<a href="photo.php?id=' . $image['id'] . '" target="_blank">
      <img width=300 src="data:' . $image['imageType'] . ';base64,'.base64_encode( $image['imageData'] ).'"/></a>';