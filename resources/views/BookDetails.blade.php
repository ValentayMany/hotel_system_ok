@extends('Layout.app')

@section('content')
    <section id="aboutSection" class="mb-5">
        <div class="container">
            <h2 class="text-center mb-4">ລາຍລະອຽດ ການຈອງໂຮງແຮມ</h2>
            {{-- p class="lead">ບ້ານພັກ ຄອນສະຫວັນ ໃຫ້ບໍລິການຫ້ອງພັກທີ່ສະອາດ, ສະດວກສະບາຍ
            ພ້ອມດ້ວຍສິ່ງອຳນວຍຄວາມສະດວກຄົບຄັນ. ຕັ້ງຢູ່ໃຈກາງເມືອງ, ໃກ້ກັບສະຖານທີ່ທ່ອງທ່ຽວ
            ແລະຮ້ານອາຫານຕ່າງໆ ແລະ ພາຍໃນບ້ານພັກຈະມີ ຢູ່ 15 ຫ້ອງທີ່ພ້ອມໃຫ້ບໍລິການ.</> --}}
        </div>
    </section>

    <table class="table table-bordered text-center ">
        <thead>
            <tr>
                <th scope="col">user_Id</th>
                <th scope="col">room</th>
                <th scope="col">check_in_date</th>
                <th scope="col">check_out_date</th>
                <th scope="col">total_price</th>
                <th scope="col">status</th>
                <th scope="col">guest_name</th>
                <th scope="col">guest_phone</th>
                <th scope="col">guest_email</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($BookDetails as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->room->room_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->check_in_date)->toDateString() }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->check_out_date)->toDateString() }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->guest_name }}</td>
                    <td>{{ $item->guest_phone }}</td>
                    <td>{{ $item->guest_email }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
