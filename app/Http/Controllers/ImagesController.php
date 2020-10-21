<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageDel(Request $request)
    {
        $file_name = $request->input('image');
        $image = Image::where('name', '=', $file_name)->first();
        $image->delete();
        return response()->json([ 'statut' => 200 ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put(
            $file->getFilename().'.'.$extension,  File::get($file)
        );
        $image = Image::create([
            'type' => $file->getClientMimeType(),
            'originalname' => $file->getClientOriginalName(),
            'name' => $file->getFilename().'.'.$extension,
        ]);
        return response()->json(['data' => $image, 'statut' => 200 ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        $file_name = $image->name;
        $mime_type = Storage::disk('local')->mimeType($file_name);
        $file_size = Storage::disk('local')->size($file_name);
//        dd($file_size);
        $file = Storage::disk('local')->get($file_name);
//        $response = new Response($file, 200);

        $response =  Response::stream(function() use($file, $mime_type, $file_size) {
            echo $file;
        }, 200, ['Content-Type' => $mime_type,
                 "Content-Transfer-Encoding" => "Binary",
                 'Content-Length' => $file_size
                ]);

        return $response;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}