@extends('web::layouts.grids.12')

@section('title', trans('seat-kook-connector::seat.kook_bind_form'))
@section('page_header', trans_choice('seat-kook-connector::seat.kook_bind_form', 0))

@section('full')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('seat-kook-connector::seat.kook_bind_form') }}</h3>
            </div>
            <div class="card-body">
                <form
                method="post"
                id="BindForm"
                action="{{ route('seat-connector.drivers.kook.registration.submit') }}"
                >
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for=""> {{ trans('seat-kook-connector::seat.kook_number') }}</label>
                            <input class="form-control" type="text" 
                            name="kook_number"
                            id="kook_number"
                            value="{{ $driver_user->connector_id }}"
                            @disabled(!is_null($driver_user->connector_id) && !$allow_modification)
                            >
                        </div>
                        <div class="form-group">
                            <label for="">{{ trans('seat-kook-connector::seat.kook_name') }}</label>
                            <input class="form-control" type="text" 
                            name="kook_name"
                            id="kook_name"
                            value="{{ $driver_user->connector_name }}"
                            @disabled(!is_null($driver_user->connector_name) && !$allow_modification)
                            >
                        </div>
                        <div class="form-group">
                            <label for="">{{ trans('web::seat.seat_user') }}</label>
                            <input class="form-control" type="text" 
                            name="seat_user"
                            id="seat_user"
                            value="{{ $seat_user->name }}"
                            disabled
                            >
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button @disabled(!is_null($driver_user->connector_id) && !$allow_modification) 
                        type="submit" form="BindForm" class="btn btn-success float-right">
                    {{ trans('seat-kook-connector::seat.submit') }}
                </button>
            </div>
        </div>
    </div>
</div>

@stop