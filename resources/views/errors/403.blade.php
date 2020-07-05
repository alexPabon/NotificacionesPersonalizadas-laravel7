@extends('layouts.master')
@section('titulo','403 Forbidden')       
    	
	@section('content')		
		<div class="pt-5">
			<div class="text-left p-3 rounded col-12 col-md-6 col-lg-4 mx-auto">
				<div class="font-weight-bold" style="font-size: 15vh;">403</div>
				<div class="pt-1 bg-danger rounded col-2"></div>
				<div class="lead">{{ucfirst($exception->getMessage())}}</div>				
			</div>
		</div>
    @endsection 
