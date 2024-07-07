@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>พิมพ์การชำละเงิน</h1>
        </div>

        <div class="savemoney_detail">
            <div>
                <h4>รายละเอียด</h4>
                {{-- <p>วันที่มารับข้าว :  <span></span></p> --}}
                <p>ชื่อ-นามสกุล :  <span>{{$savemoney->customer->customer_name}}</span></p>
                {{-- <p>พันธ์ข้าว :  <span></span></p>
                <p>น้ำหนักข้าว :  <span></span></p>
                <p>ราคา :  <span></span></p>
                <p>จำนวนกระสอบ :  <span></span></p> --}}
                <p>จำนวนกระสอบข้าวไก่ :  <span>{{$savemoney->savemoney_bagc}}</span></p>
                <p>วิธีการชำระเงิน :  <span>{{$savemoney->savemoney_type}}</span></p>
                <p>รับเงิน :  <span>{{$savemoney->savemoney_receive}}</span></p>
                <p>เงินทอน :  <span>{{$savemoney->savemoney_change}}</span></p>
            </div>
        </div>

        <div class="button-close_add-savetheday">
            <a href="{{ route('savemoney') }}">กลับ</a>
        </div>
    </div>
@endsection
