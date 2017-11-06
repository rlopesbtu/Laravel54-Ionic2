<?php

namespace CodeFlix\Http\Controllers\Admin;

use CodeFlix\Forms\VideoUploadForm;
use CodeFlix\Models\Video;
use CodeFlix\Repositories\VideoRepository;
use Illuminate\Http\Request;
use CodeFlix\Http\Controllers\Controller;

class VideoUploadsController extends Controller
{
    private $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
        $form = \FormBuilder::create(VideoUploadForm::class, [
            'url' => route('admin.videos.uploads.store',['video'=>$video->id]),
            'method' => 'POST',
            'model' => $video
        ]);
        return view('admin.videos.upload',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Video $video)
    {
        $form = \FormBuilder::create(VideoUploadForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        if ($request->file('thumb')){
            $this->repository->uploadThumb($video,$request->file('thumb'));
        }
        if ($request->file('file')) {
            $this->repository->uploadFile($video, $request->file('file'));
        }
        $request->session()->flash('message','Upload(s) realizado(s) com sucesso.');
        return redirect()->route('admin.videos.uploads.create',['video' => $video]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \CodeFlix\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CodeFlix\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CodeFlix\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CodeFlix\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
