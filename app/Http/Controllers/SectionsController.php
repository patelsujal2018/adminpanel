<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section as Model;
use App\Http\Resources\Section as ModelResource;

class SectionsController extends Controller
{
    public function index()
    {
        $sectionlist = Model::get();
        return view('backend.sections.index',compact('sectionlist'));
    }

    public function create()
    {
        return view('backend.sections.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'section_name' => 'required',
            'section_display_name' => 'required',
            'section_title' => 'max:100',
            'section_description' => 'max:200',
            'section_id' => 'required',
            'section_position' => 'required',
        ]);

        $section = New Model;
        $section->section_name = $request->section_name;
        $section->section_display_name = $request->section_display_name;
        $section->section_title = $request->section_title;
        $section->section_description = $request->section_description;
        $section->id = $request->section_id;
        $section->section_position = $request->section_position;

        if($section->save())
        {
            $toastr = ['toastr'=>"new section create successfully",'type'=>'success'];   
            return redirect()->route('sections.index')->with($toastr);
        }
    }

    public function show($id)
    {
        $section = Model::find($id);
        $section->section_status = !$section->section_status;
        if($section->save())
        {
            $toastr = ['toastr'=>"section status update successfully",'type'=>'success'];   
            return redirect()->route('sections.index')->with($toastr);
        }
    }

    public function edit($id)
    {
        $section = Model::find($id);
        return view('backend.sections.edit',compact('section'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'section_display_name' => 'required',
            'section_title' => 'max:100',
            'section_description' => 'max:200',
        ]);

        $section = Model::find($id);
        $section->section_display_name = $request->section_display_name;
        $section->section_title = $request->section_title;
        $section->section_description = $request->section_description;

        if($section->save())
        {
            $toastr = ['toastr'=>"section details update successfully",'type'=>'success'];   
            return redirect()->route('sections.index')->with($toastr);
        }
    }

    public function destroy($id)
    {
        $section = Model::find($id);
        if($section->delete())
        {
            $toastr = ['toastr'=>"section details delete successfully",'type'=>'success'];   
            return redirect()->route('sections.index')->with($toastr);
        }
    }

    public function set_sections_position(Request $request)
    {
        foreach($request->positions as $section_name => $section_position)
        {
            Model::where('section_name', $section_name)->update(['section_position' => $section_position]);
        }
        $message = "section position is update successfully";
        return response()->json($message);
    }

    public function sectionlist_api()
    {
        // $sections = Model::where('section_status',0)->orderBy('section_position','asc')->get(['section_name','section_display_name','section_title','section_description','id','section_position','section_status']);
        
        /* if(!empty($sections))
        {
            foreach ($sections as $section){
                $sectionlist[$section->section_name] = $section; 
            }
            return response($sectionlist);
        } */

        $sectionlist = Model::where('section_status',1)->orderBy('section_position','asc')->get();

        if(!empty($sectionlist))
        {
            return ModelResource::collection($sectionlist);
        }
    }
}
