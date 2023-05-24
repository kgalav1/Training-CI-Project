<body>

    <div class="container" style="width: 100%;  text-align: center;">
        <div style=" width: 90%;">
            <div >
                <img src="<?=base_url()?>assets/images/logo.png" width="250" alt="logo" />
                <address>
                    <strong>SAN Softwares Pvt Ltd</strong><br>

                    419, 4th Floor, M3M Urbana, Sector 67,<br> Gurugram, Haryana 122018
                </address>
            </div>
            <div style=" width: 100%;">
                <table style=" width: 90%;">
                    <tbody>
                    <tr >
                            <td style="  text-align: right;" colspan="2"><strong>Invoice : <?php echo $data['responce'][0]->invoice_id?></strong></td>
                            
                        </tr>
                        
                        <tr >
                            <td style="  text-align: left;" colspan="2"><strong>Date - </strong> <?php $date = $data['responce'][0]->invoice_date;
                                echo  date("d/m/Y", strtotime($date))
                                ?></td>
                           
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Customer :</strong></td>
                        

                        </tr>
                        <tr>
                            <td><?php echo "NAME : ".$data['responce'][0]->client_name;
                                echo '<br>';
                                echo "EMAIL :".$data['responce'][0]->email;
                                echo "<br>";
                                echo 'Mobile no: ' .$data['responce'][0]->phone;
                                echo "<br>";
                                echo 'Adress: ' . $data['responce'][0]->full_address
                                ?></td>
                        </tr>
                       

                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <div style="height: 50px; ">
                <span style="font-size: 40px; color: #0EADF0; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right; ">
                    Invoice
                </span>
            </div>
        </div>
        <div style="width: 100%; ">
            <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                    <tr style="margin-bottom:10px;">
                        <th style="font-size: 20px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; " width="52%" align="left">
                            Item
                        </th>
                        <th style="font-size: 20px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; " align="left">
                            <small>price</small>
                        </th>
                        <th style="font-size: 20px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; " align="center">
                            Quantity
                        </th>
                        <th style="font-size: 20px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; " align="right">
                            Subtotal
                        </th>
                    </tr>
                    <tr>
                        <td height="10" colspan="4"></td>
                    </tr>
                    <tr>
                        <td style="background: #bebebe; height:3px; margin-top:10px;" colspan="4"></td>
                    </tr>
                    <tr>
                        <td height="10" colspan="4"></td>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($data['responce']); $i++) {

                    ?>
                        <tr>
                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #0EADF0;  line-height: 18px;  vertical-align: top; " class="article">
                                <?php echo $data['responce'][$i]->name ?>
                            </td>
                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; "><small> <?php echo $data['responce'][$i]->item_price ?></small></td>
                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; " align="center"><?php echo $data['responce'][$i]->item_quantity?></td>
                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; " align="right"><?php echo $data['responce'][$i]->item_amount ?></td>
                        </tr>
                        <tr>
                            <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                        </tr>
                    <?php

                    } ?>
                </tbody>
            </table>
        </div>
        <div style="width: 100%; height:100vh;">
            <table width="90%" border="" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                    <tr>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            Total
                        </td>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                            <?php
                            $total = $data['responce'][0]->grand_total;
                            echo $total;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            Tax &amp; Fees (8%)
                        </td>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            <?php
                            $tax = $data['responce'][0]->grand_total / 100 * 8;
                            echo $tax;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                            <strong>Grand Total (Incl.Tax)</strong>
                        </td>
                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                            <strong> <?php
                                        echo $tax + $total;
                                        ?></strong>
                        </td>
                    </tr>
                    <tr>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="span8 well invoice-thank">
                <h5 style="text-align:center;">Thank You!</h5>
            </div>
        </div>
        <div>
            <div class="span3">
                <strong>Phone:</strong> 0124-4310736
                <strong>support:</strong> 0124-4310735
            </div>
            <div class="span3">
                <strong>Website:</strong> <a href="https://sansoftwares.com/">sansoftwares.com/</a>
            </div>
            <div class="span3">
                <strong>Email:</strong> <a href="support@sansoftwares.com">support@sansoftwares.com</a>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="container" style="width: 100%;  text-align: center;">


        <div class="row">
            <div class="span3">
                <strong>Phone:</strong> 0124-4310736
                <strong>support:</strong> 0124-4310735
            </div>
            <div class="span3">
                <strong>Website:</strong> <a href="https://sansoftwares.com/">sansoftwares.com/</a>
            </div>
            <div class="span3">
                <strong>Email:</strong> <a href="support@sansoftwares.com">support@sansoftwares.com</a>
            </div>
        </div>
    </div>
</footer>

</html>