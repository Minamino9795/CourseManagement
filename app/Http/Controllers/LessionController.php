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
		$this->authorize('viewAny', Lession::class);

		$limit = $request->limit ? $request->limit : 2;
		$query = Lession::select('*');

		if (isset($request->searchname)) {
			$query->where('name', 'LIKE', "%$request->searchname%");
		}
		if (isset($request->search)) {
			$query->where('type', 'LIKE', "%$request->search%");
		}
		$query->orderBy('id', 'DESC');
		$items = $query->paginate($limit);
		// $items = $query->with('lessions')->paginate($limit);
		$params =
			[
				'items' => $items,
			];
		return view('admin.lessions.index', $params);
	}

	// Thêm
	public function create()
	{
		$this->authorize('create', Lession::class);
		return view('admin.lessions.create');
	}
	public function store(LessionRequest $request)
	{
		try {

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
			return redirect()->route('lessions.index')->with('success', __('Thêm thành công'));
		} catch (QueryException $e) {
			Log::error($e->getMessage());
			dd($e->getMessage());
			return redirect()->route('lessions.index')->with('error', __('Thêm thất bại'));
		}
	}

	//  sua 
	public function edit(string $id)
	{
		try {
			$item = Lession::findOrfail($id);
			$this->authorize('update',  $item);

			$params =
				[
					'item' => $item,
				];
			return view('admin.lessions.edit', $params);
		} catch (ModelNotFoundException $e) {
			Log::error($e->getMessage());
			return redirect()->route('lessions.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
		}
	}
	public function update(LessionRequest $request, string $id)
	{
		try {
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
			return redirect()->route('lessions.index')->with('success', __('Cập nhật thành công'));
		} catch (ModelNotFoundException $e) {
			Log::error($e->getMessage());
			return redirect()->route('chapters.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
		} catch (QueryException $e) {
			Log::error($e->getMessage());
			dd($e->getMessage());
			return redirect()->route('chapters.index')->with('error', __('Cập nhật thất bại'));
		}
	}
	// xoas
	public function destroy(string $id)
	{
		try {
			$item = Lession::findOrFail($id);
			$this->authorize('delete', $item);
			$item->delete();
			return redirect()->route('lessions.index')->with('success', __('Xóa thành công'));
		} catch (ModelNotFoundException $e) {
			Log::error($e->getMessage());
			return redirect()->route('lessions.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
		} catch (QueryException  $e) {
			Log::error($e->getMessage());
			return redirect()->route('lessions.index')->with('error', __('Xóa thất bại'));
		}
	}
}
