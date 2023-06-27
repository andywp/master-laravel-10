<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use DataTables;
use Alaouy\Youtube\Facades\Youtube;


class VideoController extends Controller
{
    public function index(){
        return view('admin.video.index');
    }

    public function create(){
        return view('admin.video.create');
    }

    public function store(Request $request){
        $request->validate([
            'youtube_id'=> 'required',
            //'youtube_url'=> 'required',
            //'youtube_title'=> 'required',
        ]);
        Video::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'youtube_id' => $request->youtube_id,
                'publish' => $request->publish,
            ]
        );

        return redirect()->route('admin.video.index')
                        ->with('success','save vidio successfully.');
    }


    public function preview(Request $request){
        $error=true;
        $alert='';
        $data=array();
        $urlYoutube=$request->youtube_id;
        $youtubeID= $urlYoutube;
        if (filter_var($urlYoutube, FILTER_VALIDATE_URL) !== FALSE) {
            $youtubeID=Youtube::parseVidFromURL($urlYoutube);
        }
        $video = Youtube::getVideoInfo($youtubeID);
        //dd($video);
        if(!$video){
            $alert='URL / Youtube ID not valid';
        }else{
            $error=false;
            $data['id']=$video->id;
            $data['title']=$video->snippet->title;
            $data['description']=$video->snippet->description;
            $data['iframe']='<iframe width="100%" height="250" src="//www.youtube.com/embed/'.$video->id.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>';
        }
       
        return response()->json([
            'error' => $error,
            'alert' => $alert,
            'data'  => $data
        ]);

    }


    public function dataTable(Request $request){
        if ($request->ajax()) {

            $datas = Video::select('*');
            return DataTables::of($datas)
            ->editColumn('id', function($row){  
                //$enc_id = \Crypt::encrypt($row->id);
                $btn = '
                        <form id="fd'.$row->id.'" action="'.route('admin.video.destroy',[$row->id]).'" method="POST">
                            <input type="hidden" name="_token" value="' . csrf_token() . '" />
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="d-flex">
                                <a href="'.route("admin.video.edit",$row->id).'" data-id="'.$row->id.'" data-toggle="tooltip"  data-original-title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></a>
                                <button  type="button" data-id="'.$row->id.'" data-name="'.$row->title.'" data-toggle="tooltip"  data-original-title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                            <div>
                        </form>
                        ';
                return $btn;
            })
            ->editColumn('publish', function($row) {
                $checked=($row->publish == 1)?'checked':'';
                return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-width="70">';
            }) 
            ->editColumn('youtube_id', function($row){  

                return '<iframe width="100%" height="250" src="//www.youtube.com/embed/'.$row->youtube_id.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>';
            })
            ->rawColumns(['id','youtube_id','publish'])
            ->escapeColumns()
            ->toJson(); 
        }
    }

    public function destroy($id, Request $request){
        video::find($id)->delete();
        return redirect()->route('admin.video.index')
        ->with('success','successfully delete video');
    }

    public function edit($id){
        $data=video::find($id);
        return view('admin.video.edit',compact('data'));
    }

    public function update($id, Request $request){
        $id=(int) $id;
        $request->validate([
            'youtube_id'=> 'required',
            //'youtube_url'=> 'required',
            //'youtube_title'=> 'required',
        ]);

        $data=video::find($id);
        $data->youtube_id = $request->youtube_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.video.index')
                        ->with('success','Update vidio successfully.');
    }


    public function publish(Request $request){
        $id      = (int) $request->id;
        $publish = (int) $request->publish;
        $data=video::find($id);
        $data->publish =$publish;
        $data->save();
        $pesan='Successfully publish Vidio';
        if($publish == 0){
            $pesan='Successfully unpublish Vidio';
        }

        $response=[
            'error' => false,
            'pesan' => $pesan
        ];

        return response()->json($response);

    }


}
