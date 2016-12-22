<?php foreach($promo as $rowp){?>
    <label><?=$rowp->mpromo->name?> | <a href="javacript:void(0);" onclick="delperidpromo(<?=$rowp->id?>)">Clear</a></label>
<table class="table">
    <thead>
    <tr>
        <th>Baju</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Sub</th>
        <th>Act</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rowp->trpromo as $row): ?>
    <tr>
        <td><?=$row->mbaju?$row->mbaju->name:'Pilih baju'?></td>
        <td><?=$row->qty?></td>
        <td><?=rupiah($row->price?$row->price:0)?></td>
        <td><?=rupiah($row->total?$row->total:0)?></td>
        <td><button class="btn btn-xs btn-success" type="button" onclick="formtrpromo(<?=$row->id?>)"><i class="fa fa-edit"></i></button></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td>Harga Promo</td>
        <td colspan="4"><?=rupiah($rowp->price)?></td>
    </tr>
    </tbody>
</table>
    <hr>
<?php } ?>