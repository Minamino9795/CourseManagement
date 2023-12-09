<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessionRequest;
use App\Models\Lession;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LessionController extends Controller
{
    // hien thi all
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 2;
        $query = Lession::select('*');
        if ($request->has('search')) {
            $search = $request->search;
            $lessions = Lession::where('name', 'like', "%$search%")
                ->orWhere('type', 'like', "%$search%");
        }
         if($request->name)
		 {
                    $query->where('name',$request->name);
        }
		if($request->type)
		{
         $query->where('type',$request->type);
        }
		
		if($request->content)
		{
         $query->where('content',$request->content);
        }
		
		if($request->image_url)
		{
         $query->where('image_url',$request->image_url);
        }
		
		if($request->video_url)
		{
         $query->where('video_url',$request->video_url);
        }
		
		if($request->duration)
		{
         $query->where('duration',$request->duration);
        }		
         $query->orderBy('id', 'DESC');
		 $items = $query->paginate($limit);
                // $items = $query->with('lessions')->paginate($limit);
                $params =
                [
                    'items' => $items,
                ];
               return view ('admin.lessions.index',$params);
    }

    // Thêm
    public function create()
    {
        return view('admin.lessions.create');
    }
    public function store(LessionRequest $request)
    {
		try
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
			return redirect()->route('lessions.index')->with('success', __('sys.store_item_success'));
		}
		catch (QueryException $e)

		{
			Log::error($e->getMessage());
			dd($e->getMessage()); 
			return redirect()->route('lessions.index')->with('error',__('sys.store_item_error'));
		}
		
    }

    //  sua 
    public function edit(string $id)
    {
		try
			{
				$item = Lession::findOrfail($id);
				$params =
				[
					'item'=> $item,
				];
				return view('admin.lessions.edit', $params);
			}
        catch (ModelNotFoundException $e) 
			{
					Log::error($e->getMessage());
					return redirect()->route('lessions.index')->with('error', __('sys.item_not_found'));
			}

    }
    public function update(LessionRequest $request, string $id)
    {
			try
				{
					$items = Lession::findOrfail($id);
					$items->name = $request->name;
					$items->type = $request->type;
					$items->content = $request->content;
					$items->video_url = $request->video_url;
					$items->duration = $request->duration;
					// xử lý ảnh
					$fieldName = 'image_url';
					if ($request->hasFile($fieldName)) {
						$fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
						$fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
						$extension = $request->file($fieldName)->getClientOriginalExtension();
						$fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
						$path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
						$path = str_replace('public/', '', $path);
						$items->image_url = $path;
					}
					$items->save();
					return redirect()->route('lessions.index')->with('success', __sys('sys.update_item_success'));
				}
			
			catch (ModelNotFoundException $e)
				{
				Log::error($e->getMessage());
				return redirect()->route('chapters.index')->with('error', __('sys.item_not_found'));
				} 
			catch (QueryException $e)
				{
				Log::error($e->getMessage());
				dd($e->getMessage());
				return redirect()->route('chapters.index')->with('error', __('sys.update_item_error'));
				}	
	    
	}
	    // xoas
    public function destroy(string $id)
    {
		try {
            $item = Lession::findOrFail($id);
            $item->delete();
            return redirect()->route('lessions.index')->with('success', __('sys.destroy_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('lessions.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('lessions.index')->with('error', __('sys.destroy_item_error'));
        }
}
}