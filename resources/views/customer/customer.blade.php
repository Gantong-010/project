@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="customer-menu">

        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>

        <div class="button-customer">
            <a href="{{route("customer-add")}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <table class="table" style="width: 95%">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">ที่อยู่</th>
                <th scope="col">ID Line</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <thead>
              @foreach ($customers as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td class="table-td-name-customer">{{$item->customer_name}}</td>
                <td>{{$item->customer_phone}}</td>
                <td  class="table-edit-test">{{$item->customer_address}}</td>
                <td>{{$item->customer_idline}}</td>
                <td id="td-icon-customer-edit"> <a href="{{route('editCustomer',$item->id)}}"><i class="ri-file-edit-line"></i></a> </td>
                <td id="td-icon-customer-delete"><a onclick="return confirm('ไม่สามารถลบข้อมูลได้')"><i class="ri-delete-bin-6-line"></i></a></td>
              </tr> 
              {{-- href="{{route('deleteCustomer',$item->id)}}" --}}
              @endforeach
            </thead>
          </table>
    </div>
@endsection
