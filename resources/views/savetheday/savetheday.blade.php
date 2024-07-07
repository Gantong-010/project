@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>บันทึกแจ้งวันมารับข้าว</h1>
        </div>

        <div class="button-savetheday">
            <a href="{{route('savetheday-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <table class="table" style="width: 95%">
          <thead>
            <tr>
              <th scope="col">NO.</th>
              <th scope="col">วันที่มารับข้าว</th>
              <th scope="col">ชื่อ-นามสกุล</th>
              <th scope="col">พันธุ์ข้าว</th>
              <th scope="col">พิมพ์</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
            <thead>
              @foreach ($ricedates as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->rice_date}}</td>
                <td class="table-td-name-savetheday">{{$item->customer->customer_name}}</td>
                <td>{{$item->riceprice_rice}}</td>
                <td id="td-icon-savetheday-print"><a href="{{route('ricedatedetail',$item->id)}}"><i class="ri-printer-line"></i></a></td>
                <td id="td-icon-savetheday-edit"> <a href="{{route('editRicedate',$item->id)}}"><i class="ri-file-edit-line"></i></a> </td>
                <td id="td-icon-savetheday-delete"><a href="{{route('deleteRicedate',$item->id)}}"><i class="ri-delete-bin-6-line"></i></a></td>
              </tr>
              @endforeach
            </thead>
          </table>
        
    </div>
@endsection
