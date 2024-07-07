@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>

        <div class="button-manage-price">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึกราคาข้าว</h3>

        <form action="{{ route('insertRiceprice') }}" class="form-manage-price-add" method="POST">
            @csrf
            <label for="">ชื่อ-นามสกุล : </label>
            <select name="customer_id">
                @foreach ($customers as $item)
                    <option value="{{$item->id}}">{{ $item->customer_name}}</option>
                @endforeach
            </select><br>
            <label for="">วันที่นำข้าวมาคัด : </label>
            <input type="date" name="riceprice_date" placeholder="กำหนดวันที่"><br>

            <label for="">วันที่มารับข้าว : </label>
            <input type="date" name="rice_date" placeholder="กำหนดวันที่มารับข้าว"><br>
            
            <label for="riceType">พันธุ์ข้าว : </label>
            <select id="riceType" name="riceprice_rice" onchange="checkOther(this);">
                <option id="disnonevalue" value="">คลิกเพื่อเลือก</option>
                <option value="ข้าวหมอมะลิ 105">ข้าวหมอมะลิ 105</option>
                <option value="ข้าวหอมมะลิทุ่งกุลา">ข้าวหอมมะลิทุ่งกุลา</option>
                <option value="ข้าวเหลืองรวงยาว">ข้าวเหลืองรวงยาว</option>
                <option value="ข้าวเหนียวเขียว">ข้าวเหนียวเขี้ยวงู</option>
                <option value="other">อื่นๆ</option>
            </select>
            <input type="text" id="otherRiceType" name="riceprice_rice" placeholder="กำหนดพันธุ์ข้าว" style="display:none;"><br>

            <label for="">จำนวนกระสอบข้าว : </label>
            <input type="text" name="riceprice_quantity" placeholder="จำนวนกระสอบข้าว"><br>
            <label for="">น้ำหนักข้าว : </label>
            <input type="number" name="riceprice_weight" placeholder="กรุณาใส่น้ำหนักข้าว(x1.2)" id="number"
                oninput="calculate()"><br>
            <label for="">ราคา : </label>
            <input type="number" name="riceprice_price" placeholder="กำหนดจำนวนราคา" id="result"><br>
            <div class="button-close_add-manage-price">
                <a href="{{ route('manage-price') }}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>


        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
        <script>
            function checkOther(select) {
                var otherInput = document.getElementById('otherRiceType');
                var disnone = document.getElementById('disnonevalue');
                if (select.value === 'other') {
                    otherInput.style.display = 'inline';
                    otherInput.name = 'riceprice_rice'; // เปลี่ยนชื่อเพื่อให้ค่าถูกส่งไปใน request
                } else {
                    otherInput.style.display = 'none';
                    disnone.style.display = 'none';
                    otherInput.name = ''; // เปลี่ยนชื่อเพื่อไม่ให้ค่าถูกส่งไปใน request
                }
            }
        </script>
    </div>
@endsection
