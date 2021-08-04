@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <Div>Danh sách phòng</Div>
    </div>
          <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-room')}}" > <span class="glyphicon glyphicon-bed"></span> DS phòng </a></li>
              <li><a href="{{URL::to('/list-room-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS phòng KO HĐ</a></li>
              <li><a href="{{URL::to('/list-empty-room')}}" ><span class="glyphicon glyphicon-bed"></span> tìm phòng rỗng</a></li>
          </ul>
        <div class="row w3-res-tb">
          <form class="form-group" action="{{URL::To('/check-avalibility')}}" method="post">
          {{ csrf_field() }}
              <div class="row">

                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control date" type="date" name="start_time" id="start_time" value="{{ request()->input('start_time') }}" placeholder="{{ trans('cruds.event.fields.start_time') }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control date" type="date" name="end_time" id="end_time" value="{{ request()->input('end_time') }}" placeholder="{{ trans('cruds.event.fields.end_time') }}" required>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" type="number" name="capacity" id="capacity" value="{{ request()->input('capacity') }}" placeholder="{{ trans('cruds.room.fields.capacity') }}" step="1" required>
                    </div>
                </div> -->
                <div class="col-md-2">
                    <button class="btn btn-success">
                        tìm kiếm
                    </button>
                </div>
            </div>  
          </form>
      
        </div>

        @if($emptyroom !==null) 
          <hr />
          <div class="table-responsive">
              <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                  <thead>
                      <tr>
                          <th>
                              tên phòng 
                          </th>
                          <th>
                              ảnh
                          </th>
                          <th>
                            loại phòng
                          </th>
                          <th>
                              giá
                          </th>
                          <th>
                              Action&nbsp;
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                        <input type="hidden" name="start_time" value="{{ request()->input('start_time') }}">
                        <input type="hidden" name="end_time" value="{{ request()->input('end_time') }}">
                      @foreach($emptyroom as $room)
                        
                          <tr>
                              <td class="room-name">
                                  {{ $room->room_name  }}
                              </td>
                              <td class="room-name">
                                <div class="single-room-pic">
                                  <img src="public/upload/rooms/{{$room->image}}" height="150"; width="350";>
                                </div>
                              </td>
                              <td>
                                  {{ $room->type_id }}
                              </td>
                              <td>
                                  {{number_format($room->room_price)}} /ngày
                              </td>
                              <td>
                                  <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookRoom" data-room-id="{{ $room->room_id }}">
                                      Đặt phòng
                                  </button> -->
                                  <a href="{{URL::to('/order_room/'.$room->room_id)}}" data-room-id="{{ $room->room_id}}" class="btn btn-primary">
                                  
                                  Đặt phòng</a>
                              </td>

                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

        @else <p class="text-center">There are no rooms available at the time you have chosen</p>
        @endif
</div>

<!-- <div class="modal" tabindex="-1" role="dialog" id="bookRoom">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Booking of a room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookRoom') }}" method="POST" id="bookingForm">
                    @csrf
                    <input type="hidden" name="room_id" id="room_id" value="{{ old('room_id') }}">
                    <input type="hidden" name="start_time" value="{{ request()->input('start_time') }}">
                    <input type="hidden" name="end_time" value="{{ request()->input('end_time') }}">
                    <div class="form-group">
                    <label for="description">người đặt</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{Session::get('name')}}" required>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        <label for="description"></label>
                        <input type="text" id="description" name="adults">
                        <input type="text" id="description" name="children">
                    </div>
                    <div class="form-group">
                        <label for="recurring_until"></label>
                        
                    </div>
                    <button type="submit" style="display: none;"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitBooking">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
 

@endsection
<!-- @section('scripts')
<script>
$('#bookRoom').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var roomId = button.data('room_id');
    var modal = $(this);
    modal.find('#room_id').val(roomId);
    modal.find('.modal-title').text('Booking of a room ' + button.parents('tr').children('.room-name').text());

    $('#submitBooking').click(() => {
        modal.find('button[type="submit"]').trigger('click');
    });
});
</script>
@endsection -->