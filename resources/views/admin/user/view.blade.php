@extends('layouts.default')
@section('content')
<div class="main-content">
    @if(Session::has('message'))
        <div class="notification-msg">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            </p>
        </div>
    @endif
    <div class="main_box">      
        <div class="container-fluid">
            <h3>View Profile</h3> 
                <div class="row">
                    <div class="col-lg-6 border_rt">
                    
                        <div class="form-group">
                            <div class="row"> 
                                <div class="form-group">
                                    <label>NAME</label>
                                   <p>  {{ $data->name }}</p>
                                </div> 
                                 <div class="form-group">
                                    <label>EMAIL ADDRESS</label>
                                         <p>{{ $data->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label>PHONE NUMBER</label>
                                     <p> {{ $data->phone }} </p>
                                </div> 
                            </div>
                        </div> 
                     </div>
                 </div>
        </div>
    </div>
</div>

@endsection