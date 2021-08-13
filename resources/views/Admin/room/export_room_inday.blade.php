<table>
    <thead>
    <tr>
        <th>tên phòng</th>
        <th>loại phòng</th>
        <th>giá</th>
        <th>Loại</th>
    </tr>
    </thead>
    <tbody>
    @foreach($room as $r)
        <tr>
            <th>{{ $loop->index+1 }}</th>
            <td>{{ $r->room_name }}</td>
            <td>{{ $r->type_id }}</td>
            <td>{{ ($r->room_price)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>