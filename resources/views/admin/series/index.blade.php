@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de séries</h3>
            {!! Button::primary('Nova série')->asLinkTo(route('admin.series.create')) !!}
        </div>
        <div class="row">
            {!! Table::withContents($series->items())->striped()
                ->callback('Ações',function($field,$serie){
                    
                })
            !!}

        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">
    table > thead > tr > th:nth-child(3){
        width: 60%;
    }
</style>
@endpush