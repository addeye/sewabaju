<table class="table">
    <thead>
    <tr>
        <th>Baju</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Sub</th>
        <th><a href="javacript:void(0);" onclick="delall()">Clear</a></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tritem as $row): ?>
    <tr>
        <td><?=$row->mbaju->name?></td>
        <td><?=$row->qty?></td>
        <td><?=rupiah($row->price?$row->price:0)?></td>
        <td><?=rupiah($row->total?$row->total:0)?></td>
        <td>
            <a href="javacript:void(0);" onclick="formtritem(<?=$row->id?>)"><i class="fa fa-edit"></i></a>
            <a href="javacript:void(0);" onclick="delperid(<?=$row->id?>)"><i class="fa fa-remove"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>