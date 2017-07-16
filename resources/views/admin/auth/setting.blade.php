@extends('layouts.admin')

@section('content')
    <div class="container")>
        <div class="row">
            <h3>Editar meu perfil usuário</h3>
            <?php $icon = Icon::create('floppy-disk');?>
            {!! form($form->add('salvar','submit',
                [
                    'attr' => ['class' => 'btn bton-pri,ary btn-block'],'label' => $icon
                ]
             ))!!}
        </div>
    </div>
@endsection