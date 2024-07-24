@extends("layouts.master")
@section('title') BikeShop | รายการสินค้า @stop
@section('content')

<h1>รายการสินค้า </h1>
<div class="panel panel-default">
    <div class="panel-heading">
    <div class="panel-title"><strong>รายการ</strong></div>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('product/search') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <input type="text" name="q" class="form-control" placeholder="...">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="{{ URL::to('product/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
        </form>
    </div>

    <div class="container">

        

        <table class="table table-bordered bs_table">
        <thead>
            <tr>
                <th>รูปสินค้า </th>
                <th>รหัส</th>
                <th>ชื่อสินค้า </th>
                <th>ประเภท</th>
                <th>คงเหลือ</th>
                <th>ราคาต่อหน่วย</th>
                <th>การทํางาน</th>
            </tr>
        </thead>

        @foreach($products as $p)

        <tbody>
            <tr>
                <td><img src="{{ $p->image_url }}" width="50px"></td>
                <td>{{ $p->code }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td class = "bs_table">{{ number_format($p->stock_qty, 0) }}</td>
                <td class = "bs_table">{{ number_format($p->price, 2) }}</td>

                <td class="bs-price"> 
                <a href="{{ URL::to('product/edit/'.$p->id) }}" class="btn btn-info">
                    <i class="fa fa-edit"></i> แก้ไข</a>
                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}">
                        <i class="fa fa-trash"></i> ลบ</a>
                        
                </td>

            </tr>@endforeach

        </tbody>

        <tfoot>
            <tr>
            <th colspan="4">รวม</th>
            <th class = "bs_table">{{ number_format($products->sum('stock_qty'), 0) }}</th>
            <th class="bs-price">{{ number_format($products->sum('price'), 2) }}</th>
            <th></th>
            </tr>
            </tfoot>

        </table>

        <div class="panel-footer">
    </div>
</div>

<script>
    // ใช้เทคนิค jQuery
    $('.btn-delete').on('click', function() { if(confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")) {
    var url = "{{ URL::to('product/remove') }}"
    + '/' + $(this).attr('id-delete'); window.location.href = url;
    }
    });
</script>

{{ $products->links() }}
@endsection