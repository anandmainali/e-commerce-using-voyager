<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media  only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!--<td>
                    <table>
                        <tr>-->
                            <td class="title" colspan="2" align="left">
                                <img src="<?php echo e(productImage(setting('site.logo'))); ?>" style="width:100%; max-width:250px; height:120px;">
                            </td>
                            <td colspan="2" align="right">
                                
                                <b>Date:</b> <?php echo e(Carbon\Carbon::today()->toDateString()); ?><br>
                                
                            </td>
                        <!--</tr>
                    </table>
                </td>-->
            </tr>
            
            <tr class="information">
                <!--<td>
                    <table>
                        <tr>-->
                            <td colspan="2" align="left"><h4>From:</h4>
                                Help Me Dot Com Pvt. Ltd.<br>
                                Samakhusi-29<br>
                                Kathmandu, Nepal
                            </td>
                            
                            <td colspan="2" align="right"><h4>To:</h4>
                                <?php echo e(Auth::user()->name); ?><br>
                                
                                <?php echo e(Auth::user()->email); ?>

                            </td>
                       <!-- </tr>
                    </table>
                </td>-->
            </tr><br>
            
            <tr class="heading" style="color:green">
                <td colspan="2">
                    Payment Method:
                </td>
                
                <td colspan="2" align="right">
                   <small>Cash On Delivery</small>
                </td>
            </tr>
            
            <br>
            
            <tr class="heading">
                
                <td>
                    S.N.
                </td>
                <td>
                    Item Name
                </td>
                
                <td>
                    Quantity
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            <?php $key=0; ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="item">
                <td>
                <?php echo e(++$key); ?>

                </td>
                <td>
                    <?php echo e($product->name); ?>

                </td>
                
                <td>
                    <?php echo e($product->qty); ?>

                </td>
                
                <td>
                    Rs.<?php echo e($product->price); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            
            <tr class="total">
                <td></td>
                <td></td>
                <td><b>Total:</b></td>
                <td>
                    Rs.<?php echo e(Cart::total()); ?>

                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>
                   
                </td>
            </tr>
            <tr class="total">
                
                <td colspan="4"><b style="color:red;">Note:-</b> Your order will delivered within 3-4 days.</td>
                
            </tr>
             <tr class="total">
                
                <td align="right" colspan="4"><h3>Thank You For Purchasing With Us.<br><h4>Help Me Dot Com Pvt. Ltd.</h4></h3></td>
                
            </tr>
           
        </table>
    </div>
</body>
</html>
