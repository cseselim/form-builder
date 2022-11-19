<?php

namespace App\Http\Controllers;

use App\Models\FormModel;
use App\Models\FormModelData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use jazmy\FormBuilder\Models\Form;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request){
    	Form::create($request->all());
        return '300';
    }

    public function list(){
        $data = Form::get();
        return view('list',compact('data'));
    }

    public function edit($id){
        $data = Form::find($id);
        return view('edit',compact('data'));
    }

    public function view($id){
        $data = Form::find($id);
        return view('form',compact('data'));
    }

    public function update(Request $request, $id){
        $result = Form::where('id', $request->id)
            ->update([
                'form' => $request->form,
                'json'=>$request->json_data,
            ]);
        if ($result){
            return true;
        }
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $data = array(
            'form_id'=>$request->form_id,
            'data'=>json_encode($data),
        );
        FormModelData::create($data);
        return redirect()->route('view',$request->form_id)->with('success','Data insert success');
    }

    public function delete($id){
        FormModel::where('id',$id)->delete();
        return redirect()->route('list');
    }
}
