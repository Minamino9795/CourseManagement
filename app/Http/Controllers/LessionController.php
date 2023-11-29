<?php

namespace App\Http\Controllers;

use App\Models\Lession;
use Illuminate\Http\Request;

class LessionController extends Controller
{
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
        $lessions->image_url  = $request->image_url;
        $lessions->video_url = $request->video_url;
        $lessions->duration = $request->duration;
        $lessions->save();
        return redirect()->route('lession.index')->with('successMessage', 'Thêm thành công');
    }

    // xoas
    public function destroy(string $id)
    {
        $lessions = Lession::destroy($id);

        return redirect()->route('lession.index')->with('successMessage', 'Xóa thành công');
    }
}
