<!DOCTYPE html>
<html>
    <body>
        <?php foreach ($pdf as $key => $value): ?>
                <?php if ($key == 0): ?>
                    <?php $left = 15 ?>
                    <?php $top = 30 ?>
                    <?php $left_code = 4 ?>
                    <?php $top_code = 90 ?>
                    <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p><?= $value['name'] ?></p><p><?= $value['value'] ?></p></div>
                    <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/qrcode/') . $value['code'] . '.gif'; ?>"></div>
                <?php elseif ($key % 7 == 0 && $key > 5 && $key % 63 != 0): ?>
                    <?php $left = 15 ?>
                    <?php $top += 113; ?>
                    <?php $left_code = 4 ?>
                    <?php $top_code += 113; ?>
                    <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p><?= $value['name'] ?></p><p><?= $value['value'] ?></p></div>
                    <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/qrcode/') . $value['code'] . '.gif'; ?>"></div>
                <?php elseif ($key % 63 == 0): ?>
                <pagebreak></pagebreak>
                <?php $left = 15 ?>
                <?php $top = 30 ?>
                <?php $left_code = 4 ?>
                <?php $top_code = 90 ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p><?= $value['name'] ?></p><p><?= $value['value'] ?></p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/qrcode/') . $value['code'] . '.gif'; ?>"></div>
            <?php else: ?>
                <?php $left += 108.9; ?>
                <?php $left_code += 108.9; ?>
                <div style="position: absolute;top: <?= $top . "px" ?>;left:<?= $left . "px" ?>;right: 0;bottom: 0;margin: auto;"><p><?= $value['name'] ?></p><p><?= $value['value'] ?></p></div>
                <div style="position: absolute;top: <?= $top_code . "px" ?>;left:<?= $left_code . "px" ?>;right: 0;bottom: 0;margin: auto;"><img id="code" src="<?= base_url('assets/qrcode/') . $value['code'] . '.gif'; ?>"></div>
            <?php endif; ?>
    <?php endforeach; ?>
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