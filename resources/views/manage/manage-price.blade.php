@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>

        <div class="button-manage-price">
            <a href="{{route('manage-price-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <table class="table" style="width: 95%">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">วันที่นำข้าวมา</th>
                <th scope="col">วันที่มารับข้าว</th>
                <th scope="col">พันธุ์ข้าว</th>
                <th scope="col">กระสอบข้าว</th>
                <th scope="col">น้ำหนักข้าว</th>
                <th scope="col">ราคา</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th> 
              </tr>
            </thead>
            <thead>
              @foreach ($riceprices as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td class="table-td-name-manage-price">{{$item->customer->customer_name}}</td>
                <td>{{$item->riceprice_date}}</td>
                <td>{{$item->rice_date}}</td>
                <td>{{$item->riceprice_rice}}</td>
                <td>{{$item->riceprice_quantity}} <span>กระสอบ</span></td>
                <td>{{$item->riceprice_weight}} <span>กก.</span></td>
                <td>{{$item->riceprice_price}} <span>บาท</span></td>
                <td id="td-icon-manage-price-edit"> <a href="{{route('editRiceprice',$item->id)}}"><i class="ri-file-edit-line"></i></a> </td>
                <td id="td-icon-manage-price-delete"><a href="{{route('deleteRiceprice',$item->id)}}"><i class="ri-delete-bin-6-line"></i></a></td>
              </tr>
              @endforeach
            </thead>
          </table>
        
    </div>
@endsection
