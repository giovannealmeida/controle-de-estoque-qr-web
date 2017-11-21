<!DOCTYPE html>
<html>
    <body>
        <?php for ($i = 0; $i < 500; $i++): ?>

            <?php if ($i == 0): ?>
                <img id="imagem" src="<?= base_url('assets/img/etiqueta2.jpg'); ?>"/>
                <?php $left = 60 ?>
                <?php $top = 50 ?>
                <?php $left_code = 55.7 ?>
                <?php $top_code = 100 ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img style="width: 2.8cm; height: 1cm" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
            <?php elseif ($i % 6 == 0 && $i > 5 && $i % 66 != 0): ?>
                <img id="imagem" src="<?= base_url('assets/img/etiqueta2.jpg'); ?>"/>
                <?php $left = 60 ?>
                <?php $top += 89.7; ?>
                <?php $left_code = 55.7 ?>
                <?php $top_code += 89.2; ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img style="width: 2.8cm; height: 1cm" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
            <?php elseif ($i % 66 == 0): ?>
            <pagebreak></pagebreak>
            <img id="imagem" src="<?= base_url('assets/img/etiqueta2.jpg'); ?>"/>
            <?php $left = 60 ?>
            <?php $top = 50 ?>
            <?php $left_code = 55.7 ?>
            <?php $top_code = 100 ?>
            <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
            <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img style="width: 2.8cm; height: 1cm" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
        <?php else: ?>
            <img id="imagem" src="<?= base_url('assets/img/etiqueta2.jpg'); ?>"/>
            <?php $left += 112.7; ?>
            <?php $left_code += 112.7; ?>
            <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
            <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img  style="width: 2.8cm; height: 1cm" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
        <?php endif; ?>
    <?php endfor; ?>
</body>
<style>
    #imagem {
        width: 3.0cm;
        height: 2.5cm;
        padding-left: -5px;
        padding-top: -10px;
    }

    p{
        font-size: 6px;
        width: 1.2cm;
    }
</style>
</html>