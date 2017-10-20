<!DOCTYPE html>
<html>
<body>
<?php for($i=0; $i<136; $i++): ?>
    <img id="imagem" src="<?= base_url('assets/img/etiqueta.jpg'); ?>"/>
    <?php if($i == 0): ?>
        <?php $left = 70 ?>
        <?php $top = 70 ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:70px;right: 0;bottom: 0;margin: auto;"><img width="35px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png"></div>
    <?php elseif($i % 8 == 0 && $i > 7): ?>
        <?php $left=70; $top+=58.2; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><img width="35px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png"></div>
    <?php else: ?>
        <?php $left+=80; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><img  width="35px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png"></div>
    <?php endif; ?>
<?php endfor; ?>
</body>
<style>
    #imagem {
        width: 2cm;
    }

    p{
        font-size: 3px
    }
</style>
</html>