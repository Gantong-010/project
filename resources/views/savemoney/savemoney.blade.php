@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>พิมพ์การชำละเงิน</h1>
        </div>

        <div class="button-savetheday">
            <a href="{{ route('savemoney-add') }}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>
      
        <table class="table" style="width: 95%">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">วันที่มารับข้าว</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">พิมพ์</th>
                    <th scope="col">แก้ไข</th>
                    {{-- <th scope="col">ลบ</th> --}}
                </tr>
            </thead>
            <thead>
                @if (!isset($savemoneys) || $savemoneys->isEmpty())
                    <tr>
                        <td colspan="6">ยังไม่ได้เพิ่มข้อมูลการชำระเงินของ User นั้นๆ</td>
                    </tr>
                @else  
                    @foreach ($savemoneys as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ricedate->rice_date}}</td>
                            <td class="table-td-name-manage-price">{{ $item->customer->customer_name }}</td>
                            <td id="td-icon-savetheday-print"><a href="{{ route('savemoneydetail', $item->id) }}"><i
                                        class="ri-file-list-3-line"></i></a></td>
                            <td id="td-icon-savetheday-print"><a href="{{ route('billSavemoney', $item->id) }}"><i
                                        class="ri-printer-line"></i></a></td>
                            <td id="td-icon-savetheday-edit"> <a href="{{ route('editSavemoney', $item->id) }}"><i
                                        class="ri-file-edit-line"></i></a> </td>
                        </tr>
                    @endforeach
                @endif
            </thead>
        </table>

    </div>
@endsection
