@extends('layouts.admin')
@section('title', 'Create Order')
@section('content-header', 'Create Order')
@section('content')
<div class="card">
   <div class="card-body">
      <form action="{{ route('orders.update', $order['id']) }}"  method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-group">
            <label for="cname"> Customer Name</label>
            <input type="text" name="cname" class="form-control @error('cname') is-invalid @enderror" id="cname"
               placeholder="Name"  value="{{ old('cname', $order->customer_name) }}">
            @error('cname')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="price"
               placeholder="phone" value="{{ old('phone',$order->phone_number) }}">
            @error('phone')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div>
            <table class="table table-bordered" id="product_info_table">
            <thead>
               <tr>
                  <th style="width:50%">Product</th>
                  <th style="width:10%">Qty</th>
                  <th style="width:10%"><button type="button" class="add_row" id="add_row" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></th>
               </tr>
            </thead>
            <tbody  id="TextBoxContainer">
               @foreach($order->items as $keys => $values)
               <tr id="row_1">
                  <td>
                     <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                     @foreach ($products as $k => $v)
                     <option value="{{  $v['id']   }}" {{ (  $v['id']  == $values->product_id) ? 'selected' : '' }}> 
                     {{ $v['name'] }} 
                     </option>
                     @endforeach 
                     </select>
                  </td>
                  <td><input type="text" name="qty[]" id="qty_1" class="form-control" value=<?php echo $values->quantity ?> required > </td>
                  <td><button type="button" class="btn btn-danger remove"><i class="fas fa-trash"></i></button></td>
               </tr>
               @endforeach
            </tbody>
</table>
         </div>
         <button class="btn btn-primary" type="submit">Update</button>
      </form>
   </div>
</div>
@endsection
@section('js')
<@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
   $(document).ready(function () {
       bsCustomFileInput.init();
   });
   
</script>
<script>
   $(function () {
   $("#add_row ").bind("click", function () {
       var div = $("<tr />");
       div.html(GetDynamicTextBox(""));
       $("#TextBoxContainer").append(div);
   });
   $("body").on("click", ".remove", function () {
       $(this).closest("tr").remove();
   });
   });
   function GetDynamicTextBox(value) {
   return '<td><select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required><option value="Select Product" disabled="true" selected></option><?php foreach ($products as $k => $v): ?> <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option><?php endforeach ?></select></td> ' + '<td><input type="text" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>' +
       '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td>'
   }
</script>
@endsection