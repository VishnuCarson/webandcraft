<?php
   $admin_email=config('app.admin_email');
   $admin_mobile=config('app.admin_mobile');
   $shop_address=config('app.shop_address');
    ?> 
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{asset('public/css/custom.css')}}" rel="stylesheet">
<!------ Include the above in your HEAD tag ----------> 
<style type="text/css"> body{
   width:100%!important;
   font-size:12px;
   font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
   }
   *{
   font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
   }
   .container{
   width: 700px;
   }
   .outer_border{
   border:1px solid #999999!important;
   padding:4%!important;
   margin-bottom:2%!important;
   }
   .top_box{
   width:47%; padding:0%
   }
   .table_pad{
   padding:0% 2%;
   } 
   .border{
   border:1px solid #CCCCCC!important;
   }
   .small_text{
   font-size:10px!important;
   }
   .bg_color1{
   background:#3a5082;
   color: #fff;
   }
   .text_color1{
   color:#3a5082;
   }
   td{
   padding:4px;
   } 
</style>
<?php
   $OrderController=new App\Http\Controllers\OrderController;
     
   ?>
<div class="container">
      <dd style="clear:both;"></dd>
      <div class="row">
         <table height="82" class=" " style=" width:100%;">
            <tr class="bg_color1">
               <td width="25%" height="12" style="padding-left: 10px;">ORDER ID</td>
               <td width="50%">{{$order['id']}}</td>
            </tr>
            <tr>
            @foreach($order['items'] as  $order_key => $order_values) 
            <tr class="bg_color1 ">
            <td width="25%" height="12" style="padding-left: 10px;">PRODUCTS</td>
      

               <td> {{$order_key + 1 }}.   
                   {{$order_values['product']['name'] }} * {{$order_values['quantity']}}  = {{$order_values['quantity'] *  $order_values['product']['price'] }}
               </td>
 
              
            </tr>
            @endforeach 
            </tr>
            <tr class="bg_color1">
            <td width="25%" height="12" style="padding-left: 10px;">Total Amount</td>
            <td width="50%" height="12" style="padding-left: 10px;">{{$order['total_amount']}}</td>
   
         </table>
      </div>

   </div>
</div>