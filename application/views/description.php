<!DOCTYPE html>
<html>
<body>
<?php for($i=0; $i<1; $i++): ?>
    <img id="imagem" src="<?= base_url('assets/img/etiqueta.jpg'); ?>"/>
    <?php if($i == 0): ?>
        <?php $left = 70 ?>
        <?php $top = 60 ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
    <?php elseif($i % 4 == 0 && $i > 3): ?>
        <?php $left=70; $top+=89.7; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
    <?php else: ?>
        <?php $left+=160; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
    <?php endif; ?>
<?php endfor; ?>

<?php for($i=0; $i<1; $i++): ?>
    <?php if($i == 0): ?>
        <?php $left = 57.4 ?>
        <?php $top = 110 ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><img style="width: 2.8cm; height: 1cm" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
    <?php elseif($i % 4 == 0 && $i > 3): ?>
        <?php $left=61; $top+=90; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><img style="width: 1.7cm; height: 1cm" src="data:image/png;base64,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"></div>
    <?php else: ?>
        <?php $left+=160.7; ?>
        <div style="position: absolute;top: <?=$top . "px" ?>;left:<?=$left . "px" ?>;right: 0;bottom: 0;margin: auto;"><img  style="width: 1.7cm; height: 1cm" src="data:image/png;base64,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"></div>
    <?php endif; ?>
<?php endfor; ?>
</body>
<style>
    #imagem {
        width: 5.7cm;
        height: 2.5cm;
    }

    p{
        font-size: 6px;
        width: 1.2cm;
    }
</style>
</html>