<?php

namespace App\Http\Controllers\Cognition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cognition\Document;
use App\Cognition\EventTypeIndicator;
use Illuminate\Support\Facades\Auth;

class EtiBrowserController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['direct']]);
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiList =  EventTypeIndicator::
            orderBy('label','asc')
            ->get()
            ->pluck('label','name');

        return response()
            ->view('cognition.etiList', ['etis' => $etis]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $typeList =  [
            'eti' => 'Event Type Indicator',
            'doc' => 'General Document',
            'ci'  => 'CI Document'
        ];

        try {

           if (preg_match('/[0-9]+/', $id)) {
               $doc = Document::
               with('author','editor','comments','tags','all_sections')
                   //->where('type', 'eti')
                   ->where('id', $id)
                   ->firstOrFail();
           } else {
               $doc = Document::
               with('author','editor','comments','tags','all_sections')
                   //->where('type', 'eti')
                   ->where('key', $id)
                   ->firstOrFail();
           }
           return response()
              ->view('cognition.show', [
                  'doc'      => $doc,
                  'type'     => 'eti',
                 // 'user'     => Auth::user(),
                  'typeList' => $typeList
              ]);
            //->view('cognition.index', ['doc' => $doc, 'type' => 'eti']);
        } catch (\Exception $e) {
           //dd($e);
           return response()
              ->view('cognition.notfound', ['id' => $id, 'type' => 'eti']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function direct($id)
    {

        $typeList =  [
            'eti' => 'Event Type Indicator',
            'doc' => 'General Document',
            'ci'  => 'CI Document'
        ];

        try {

            if (preg_match('/[0-9]+/', $id)) {
                $doc = Document::
                with('author','editor','comments','tags','all_sections')
                    //->where('type', 'eti')
                    ->where('id', $id)
                    ->firstOrFail();
            } else {
                $doc = Document::
                with('author','editor','comments','tags','all_sections')
                    //->where('type', 'eti')
                    ->where('key', $id)
                    ->firstOrFail();
            }
            return response()
                ->view('cognition.showdirect', [
                    'doc'      => $doc,
                    'type'     => 'eti',
                    'user'     => Auth::user(),
                    'typeList' => $typeList
                ]);
            //->view('cognition.index', ['doc' => $doc, 'type' => 'eti']);
        } catch (\Exception $e) {
            dd($e);
            return response()
                ->view('cognition.notfound', ['id' => $id, 'type' => 'eti']);
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
        $etiList =  EventTypeIndicator::orderBy('label','asc')->get()->pluck('label','name');

        $doc = Document::
            with('author','editor','comments','tags','all_sections')
            ->findOrFail($id);

        return response()
            ->view('cognition.eti.edit', ['doc' => $doc, 'user' => Auth::user(), 'etiList' => $etiList]);
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
        $doc = Document::findOrFail($id);

        //  Delete section 'purpose'
        $section = $doc->getSection('purpose');
        $section->delete();

        //  Update section 'related'
        $section = $doc->getSection('related');
        $section->delete();

        //  Update section 'instructions'
        $section = $doc->getSection('instructions');
        $section->delete();

        //  Delete main doc
        $doc->delete();
        return redirect('/cognition/doc/eti');
    }
}
