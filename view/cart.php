<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>index</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://cdn.rawgit.com/maechabin/bootstrap-material-button-color/master/dist/cb-materialbtn.0.5.5.min.css">

    <style>
    table { table-layout: fixed; }
    table th, table td { overflow: hidden; }
    </style>
</head>
<body>
    <!-- main -->
    <div class="section">
        <div class="container">
            <div class="jumbotron mt-4">
                <h2 class="disply-4">商品一覧</h2>
                <hr clas="my-4">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-warning " href="./index.php" role="button">QRコード読み取りに戻る</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-warning pt-3">金額の入力間違いないようにご注意ください。</p>
                    </div>
                </div>
                <!-- 
                <div class="row">
                    <div class="col">
                        <h3><a class="btn btn-primary btn-lg" href="./index.php" role="button">TOP</a></h3>
                        <h3><a class="btn btn-primary btn-lg" href="#" role="button">商品入力</a></h3>
                    </div>
                    <div class="col">
                        <h3><a class="btn btn-warning " href="#" role="button">在庫確認</a></h3>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 40px" scope="col">#</th>
                                <th scope="col">商品名</th>
                                <th style="width: 80px"scope="col">価格</th>
                                <th style="width: 10%" scope="col">個数</th>
                                <th style="width: 35%"scope="col">小計</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $c=1;
                            $sum=0;
                            foreach ($product_list as $product):
                                if($product["cnt"]!=0):
                          ?>
                            <tr>
                                <th scope="row"><?php echo $c++;?></th>
                                <td><?=$product["item_name"] ?></td>
                                <td><?=$product["price"] ?></td>
                                <td><?=$product["cnt"] ?></td>
                                <td>￥<?php
                                      echo intval($product["price"])*intval($product["cnt"]);
                                      $sum+=intval($product["price"])*intval($product["cnt"]);
                                    ?></td>
                            </tr>
                          <?php 
                            endif;
                            endforeach; ?>
                            <tr >
                                <td colspan="2"></td>
                                <td colspan="2" class="table-info">税額</td>
                                <td>￥<?php echo intval($sum*0.08); ?></td>
                            </tr>
                            <tr >
                                <td colspan="2"></td>
                                <td colspan="2" class="table-info">合計金額</td>
                                <td>￥<?php echo intval($sum*1.08); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="table-info">お預かり金額</td>
                                <td rowspan="">
                                    <form method="post" action="?page=scart">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span style="" class="input-group-text" id="basic-addon1">￥</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="Liq">
                                        </div>
                                </td>
                            </tr>
                            <tr >
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-cyan500_rsd" placeholder="" aria-label="" aria-describedby="basic-addon1" name="sub" value="清算">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php
$_SESSION['p']=$product_list;
$_SESSION['sum']=$sum;
$_SESSION['id']=$id_list[0];
$_SESSION['flg']=$id_list[1];
?>