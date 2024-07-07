@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>พิมพ์การชำระเงิน</h1>
        </div>

        <div class="button-savetheday">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึกการชำละเงิน</h3>

        <form action="{{ route('insertSavemoney') }}" class="form-savetheday-add" method="POST">
            @csrf
            <label for="">ชื่อ-นามสกุล :</label>
            <select name="customer_id">
                @foreach ($customers as $item)
                    <option value="{{$item->id}}">{{ $item->customer_name }}</option>
                @endforeach
            </select><br>
            <label for="">วันที่มารับข้าว</label>
            <select name="rice_date_id">
                @foreach ($ricedates as $item)
                    <option value="{{ $item->id}}">{{ $item->rice_date}}</option>
                @endforeach
            </select><br>
            <label for="">ข้าวไก่</label>
            <input type="text" name="savemoney_bagc" placeholder="จำนวนกระสอบข้าวไก่"><br>
            <label for="">วิธีชำระเงิน :</label>
            <input type="text" name="savemoney_type" placeholder="วิธีชำระเงิน"><br>
            <label for="">รับเงิน :</label>
            <input type="text" name="savemoney_receive" placeholder="รับเงิน"><br>

            {{-- <div>
                <p>ราคาข้าวของ id นั้นๆ</p>
            </div> --}}

            <label for="">เงินทอน :</label>
            <input type="text" name="savemoney_change" placeholder="เงินทอน"><br>

            <div class="button-close_add-savetheday">
                <a href="{{ route('savemoney') }}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>



    </div>
@endsection
