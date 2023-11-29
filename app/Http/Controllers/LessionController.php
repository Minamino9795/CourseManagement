<?php

namespace App\Http\Controllers;

use App\Models\Lession;
use Illuminate\Http\Request;

class LessionController extends Controller
{
    // hien thi all
    public function index(Request $request)
    {
        $lessions = Lession::paginate(4);
        if (isset($request->search)) {
            $search = $request->search;
            $lessions = Lession::where('name', 'like', "%$search%")
                ->paginate();
        }
        return view('lessions.index', compact('lessions'));
    }

    // Thêm
    public function create()
    {
        return view('lessions.create');
    }

    public function store(Request $request)
    {

        $lessions = new Lession();
        $lessions->name = $request->name;
        $lessions->type = $request->type;
        $lessions->content = $request->content;
        $lessions->video_url = $request->video_url;
        $lessions->duration = $request->duration;

        // xử lý ảnh

        $fieldName = 'image_url';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $lessions->image_url = $path;
        }


        $lessions->save();
        return redirect()->route('lession.index')->with('successMessage', 'Thêm thành công');
    }

    // xoas
    public function destroy(string $id)
    {
        $lessions = Lession::destroy($id);
        return redirect()->route('lession.index')->with('successMessage', 'Xóa thành công');
    }


    
    //  sua 
    public function edit(string $id)
    {
        $lessions = Lession::find($id);
        return view('lessions.edit',compact('lessions'));
    }

    public function update(Request $request,string $id)
    {
        $lessions = Lession::find($id);
        $lessions->name = $request->name;
        $lessions->type = $request->type;
        $lessions->content = $request->content;
        $lessions->video_url = $request->video_url;
        $lessions->duration = $request->duration;

        // xử lý ảnh

        $fieldName = 'image_url';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $lessions->image_url = $path;
        }



        $lessions->save();
        return redirect()->route('lession.index')->with('successMessage', 'Cập nhật thành công');
    }
}
