<?php

namespace App\Http\Controllers;
use App\Traits\UploadFileTrait;

use App\Http\Requests\LessionRequest;
use App\Models\Lession;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class LessionController extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 5;
        $query = Lession::select('*');
		if (isset($request->s)) 
			{
				$query->where('name', 'like', "%$request->name%")
                ->orWhere('type', 'like', "%$request->type%");
				
			};
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
			
			$item = new Lession();
			$item->name = $request->name;
			$item->type = $request->type;
			$item->content = $request->content;
			$item->video_url = $request->video_url;
			$item->duration = $request->duration;
		
			if ($request->hasFile('image_url')) {
				$item->image_url = $this->uploadFile($request->file('image_url'), 'uploads');
			}
			
			$item->save();
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
					// dd($e->getMessage());
					return redirect()->route('lessions.index')->with('error', __('sys.item_not_found'));
			}

    }
    public function update(LessionRequest $request, $id)
    {
			try
				{
					$item = Lession::findOrfail($id);
					$item->name = $request->name;
					$item->type = $request->type;
					$item->content = $request->content;
					$item->video_url = $request->video_url;
					$item->duration = $request->duration;
				
					if ($request->hasFile('image_url'))
						{
						$item->image_url = $this->uploadFile($request->file('image_url'), 'uploads');
						}
					
						$item->save();
					return redirect()->route('lessions.index')->with('success', __('sys.update_item_success'));
				}
			
			catch (ModelNotFoundException $e)
				{
				Log::error($e->getMessage());
				return redirect()->route('lessions.index')->with('error', __('sys.item_not_found'));
				} 
			catch (QueryException $e)
				{
				Log::error($e->getMessage());
				return redirect()->route('lessions.index')->with('error', __('sys.update_item_error'));
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
	public function show($id)
    {
         try {
        $item = Lession::findOrFail($id);
        $params = [
            'item' => $item
        ];
        return view("admin.lessions.show", $params);
    } catch (ModelNotFoundException $e) {
        Log::error($e->getMessage());
        return redirect()->route('lessions.index')->with('error', __('sys.item_not_found'));
    }
    }
}