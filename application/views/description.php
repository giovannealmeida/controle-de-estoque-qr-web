<!DOCTYPE html>
<html>
    <body>
        <?php for ($i = 0; $i < 63; $i++): ?>
            <?php if ($i == 0): ?>
                <?php $left = 15 ?>
                <?php $top = 30 ?>
                <?php $left_code = 4 ?>
                <?php $top_code = 90 ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
            <?php elseif ($i % 7 == 0 && $i > 5 && $i % 66 != 0): ?>
                <?php $left = 15 ?>
                <?php $top += 113; ?>
                <?php $left_code = 4 ?>
                <?php $top_code += 113; ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
            <?php elseif ($i % 66 == 0): ?>
            <pagebreak></pagebreak>
            <?php $left = 15 ?>
                <?php $top = 30 ?>
                <?php $left_code = 4 ?>
                <?php $top_code = 90 ?>
            <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
            <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
        <?php else: ?>
            <?php $left += 108.9; ?>
            <?php $left_code += 108.9; ?>
            <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p>Colar Discos Entrelaçados</p><p>R$ 50,00</p></div>
            <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/img/cadastro.gif'); ?>"></div>
        <?php endif; ?>
    <?php endfor; ?>
</body>
<style>
    #imagem {
        width: 2.6cm;
        height: 3.07cm;
        margin-top: -2mm;
        margin-left: 1.7mm;
    }

    #code {
        width: 2.5cm;
        height: 1.2cm;
    }

    p{
        font-size: 6px;
        width: 1.2cm;
    }
</style>
</html>