<?php

        $tabs = [
          [
              'title' => 'Informações',
              'link' => !isset($video)?route('admin.videos.create'):route('admin.videos.edit',['video' => $video->id])
          ],

            [
                'title' => 'Série e Categorias',
                'link' => !isset($video)?'#':route('admin.videos.relations.create',['video'=>$video->id]),
                'disabled' => !isset($video)?true:false

            ],
            [
                'title' => 'Video e thumbnail',
                'link' => ''
            ]

        ];
        ?>
<h3>Gerenciar vídeo</h3>
<div class="text-right">
    {!! Button::link('Listar Videos')->asLinkTo(route('admin.videos.index')) !!}
</div>
{!! Navigation::tabs($tabs) !!}
<div>
 {!! $slot !!}
</div>


