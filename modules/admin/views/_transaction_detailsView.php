 <?php //var_dump($transaction);?>
<div class="col-md-12">
    <p>
        <strong>Status transakcije: </strong> <br>
        <strong>Korisnik: </strong> <?=$user->first_name ." ". $user->last_name?> <br>
        <strong>E-mail:  </strong> <?=$user->email?> <br>
    </p>
    <p>
    <strong></strong>
    </p>
</div>
<div class="col-md-12">
    <!--   Kitchen Sink -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><?=$transaction->transaction_id?></strong>
        </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Naziv proizvoda</th>
                            <th>Kolicina</th>
                            <th>Pojedinacna cena</th>
                            <th>Ukupno</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php 
                  $i = 1;
                  foreach($transaction_detail as $product) {?>
                        <tr>
                            <td><strong>#<?=$i++?></strong></td>
                            <td><?=$product->product_name?></td>
                            <td><?=$product->orderProductQuantity?></td>
                            <td><?=$product->product_unit_price?> €</td>
                            <td><?=number_format($product->orderProductQuantity * $product->product_unit_price, 2, '.', '');?> €</td>
                        </tr>
                   <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>PDV:</strong></td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Cena svih proizvoda sa PDV-om:</strong></td>
                            <td><?=$transaction->total_price?> €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Troskovi isporuke:</strong></td>
                            <td><?=$shipping_method->price?> €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Ukupno:</strong></td>
                            <td><?=number_format($transaction->total_price + $shipping_method->price, 2, '.', '');?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <!-- End  Kitchen Sink -->
</div>