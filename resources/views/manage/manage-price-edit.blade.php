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

        <h3>ฟอร์มแก้ไขราคาข้าว</h3>

        <form action="{{route('updateRiceprice', $editRiceprice->id)}}" method="POST" class="form-manage-price-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : {{$editRiceprice->customer->customer_name}}</label><br>
            <label for="">วันที่นำข้าวมาคัด : </label>
            <input type="date" name="riceprice_date" value="{{$editRiceprice->riceprice_date}}"><br>
            <label for="">วันที่นัดรับข้าว : </label>
            <input type="date" name="rice_date" value="{{$editRiceprice->rice_date}}"><br>
            <label for="">กระสอบข้าว : </label>
            <input type="text" name="riceprice_quantity" value="{{$editRiceprice->riceprice_quantity}}"><br>
            <label for="">พันธุ์ข้าว : </label>
            <input type="text" name="riceprice_rice" value="{{$editRiceprice->riceprice_rice}}"><br>
            <label for="">น้ำหนักข้าว : </label>
            <input type="number" name="riceprice_weight" value="{{$editRiceprice->riceprice_weight}}" id="number" oninput="calculate()"><br>
            <label for="">ราคา : </label>
            <input type="number" name="riceprice_price" value="{{$editRiceprice->riceprice_price}}" id="result"><br>
            <div class="button-close_edit-manage-price">
                <a href="{{route("manage-price")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
    </div>
@endsection
