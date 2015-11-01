<?php
include_once("../../login/check.php");

$miembros=$_SESSION['miembros'];
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th width="50">N</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <!--<th></th>-->
        </tr>
    </thead>
    <?php if(!empty($miembros)){foreach($miembros as $m){$i++?>
    <tr>
        <td class="der"><?php echo $i;?></td>
        <td><?php echo $m['datos']?></td>
        <td><?php echo $m['cargo']?></td>
        <!--<td><?php echo $m['cod']?></td>-->
    </tr>
    <?php }
    }
    ?>
</table>