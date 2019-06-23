<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;
use App\Authority;
use App\Track;
use Illuminate\Http\Request;
use Validator;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
class ExamController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $exams = Exam::orderBy("updated_at")->with(['trackName' => function($q) {
           $q->select('name');
       },'authorityName' => function($q) {
           $q->select('name');
       }
           ])->get();
        return datatables()->of($exams)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'Authority'    => 'required',
                'title'    => 'required',
                'tags'    => 'required',
                'Track'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore= new Exam();
            $examToStore["authorityID"]=$request["Authority"];
            $examToStore["trackID"]=$request["Track"];
            $examToStore["title"]=$request["title"];
            //$examToStore["ownerID"]=Auth::id();
            $examToStore["ownerID"]="5c97ebff2ace521b10006e02";
            $examToStore->save();
            $all = $request->all();
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
             $tags = $examToStore->tags()->create(['tag' =>$value]);
            }

            return response()->json($examToStore);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($id);

        return response()->json($exam);

    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore=  Exam::where("_id",$id)->first();
            $examToStore["authorityID"]=$request["Authority"];
            $examToStore["trackID"]=$request["Track"];
            $examToStore["catID"]=$request["Category"];
            $examToStore["title"]=$request["title"];
            $examToStore["ownerID"]=Auth::id();
            $examToStore->tags()->delete();
            $examToStore->save();
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
             $tags = $examToStore->tags()->create(['tag' =>$value]);
            }

    }


    public function destroy($id)
    {
        Exam::where('_id', $id)->delete();
    }

    //You need to add questions to the exam




}