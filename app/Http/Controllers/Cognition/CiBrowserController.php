<?php

namespace App\Http\Controllers\Cognition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cognition\Document;

class CiBrowserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        //  Check to see if the user selected the root of the view (eg: nothing)
        if ($id == 1) {
            return view('index');
        }
   
        //  Check to see if we are getting CI RTSM_ID or 
        //  a Device Type surrounded by {} 

        preg_match('/\{(\S*)\}/', $id, $matches);
        if (empty($matches[1])) {
	    $type = "ci";
        } else {
            $type = "os";
            $key  = $matches[1];
        } 
        try {
           $doc = Document::
                with('author','editor','comments','tags','all_sections')
              ->where('type', $type)
              ->where('key', $id)
              ->firstOrFail();
           return response()
              ->view('cognition.index', ['doc' => $doc, 'type' => $type]);
              //->header('X-FRAME-OPTIONS', 'ALLOW-FROM http://emspr01bvwa.healthnow.org/');
        } catch (\Exception $e) {
           //dd($e);
           return response()
              ->view('cognition.notfound', ['id' => $id, 'type' => $type]);
              //->header('X-FRAME-OPTIONS', 'ALLOW-FROM http://emspr01bvwa.healthnow.org/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blank()
    {
        return view('index');
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
    public function destroy($id)
    {
        //
    }
}
