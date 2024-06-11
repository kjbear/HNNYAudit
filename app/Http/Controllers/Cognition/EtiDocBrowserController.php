<?php

namespace App\Http\Controllers\Cognition;

use App\Cognition\Document;
use App\Cognition\DocumentSection;
use App\Cognition\EventTypeIndicator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EtiDocBrowserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest = Document::
              where('redirect_id', null)
            ->where('status','published')
            ->orderBy('id','desc')
            ->take(5)
            ->get();
        $doc_count = Document::
              where('redirect_id', null)
            ->where('status','published')
            ->where('type','eti')
            ->get()
            ->count();
        $eti_count = Document::
              where('redirect_id', null)
            ->where('status','published')
            ->where('type','eti')
            ->get()
            ->count();
        $ci_count = Document::
              where('redirect_id', null)
            ->where('type','ci')
            ->where('status','published')
            ->get()
            ->count();
        return response()->view(
            'cognition.eti.dashboard',
            [
                'latest'    => $latest,
                'doc_count' => $doc_count,
                'eti_count' => $eti_count,
                'ci_count'  => $ci_count
            ],
            200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $etiList  =  EventTypeIndicator::orderBy('label','asc')->get()->pluck('label','name');

        return response()->view(
            'cognition.eti.new',
            [
                'user'    => Auth::user(),
                'etiList' => $etiList,

            ],
            200
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $doc = new Document;
        $doc->title = $request->title;
        $doc->author_id = Auth::user()->id;
        $doc->type = $request->type;
        $doc->key = $request->key;
        $doc->status = $request->status;

        $doc->save();

        //  Save Purpose Section
        $section = new DocumentSection;
        $section->document_id = $doc->id;
        $section->name        = 'purpose';
        $section->title       = 'Purpose/Scope';
        $section->body        = $request->purpose;
        $section->author_id   = Auth::user()->id;
        $section->save();

        //  Save Related Section
        $section = new DocumentSection;
        $section->document_id = $doc->id;
        $section->name        = 'related';
        $section->title       = 'Related Documents';
        $section->body        = $request->related;
        $section->author_id   = Auth::user()->id;
        $section->save();

        //  Save Instructions Section
        $section = new DocumentSection;
        $section->document_id = $doc->id;
        $section->name        = 'instructions';
        $section->title       = 'Instructions / Documentation';
        $section->body        = $request->instructions;
        $section->author_id   = Auth::user()->id;
        $section->save();

        return redirect('/cognition/doc/eti');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doc = Document::findOrFail($id);


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
        $doc = Document::findOrFail($id);

        //  Update main document record
        $doc->update(
            [
                'title'     => $request->title,
                'editor_id' => Auth::user()->id,
                'type'      => $request->type,
                'key'       => $request->key,
                'status'    => $request->status
            ]
        );

        //  Update section 'purpose'
        $section = $doc->getSection('purpose');
        $section->update(
           [
               'body' => $request->purpose,
               'editor_id' => Auth::user()->id
           ]
        );

        //  Update section 'related'
        $section = $doc->getSection('related');
        $section->update(
            [
                'body' => $request->related,
                'editor_id' => Auth::user()->id
            ]
        );

        //  Update section 'instructions'
        $section = $doc->getSection('instructions');
        $section->update(
            [
                'body' => $request->instructions,
                'editor_id' => Auth::user()->id
            ]
        );


        return redirect('/cognition/doc/eti/'.$id);
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
