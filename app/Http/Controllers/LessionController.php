<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessionRequest;
use App\Models\Course;
use App\Models\Lession;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LessionController extends Controller
{
	// hien thi all
	public function index(Request $request)
	{
		$this->authorize('viewAny', Lession::class);

		$limit = $request->limit ? $request->limit : 10;
		$query = Lession::select('*');

		if (isset($request->searchname)) {
			$query->where('name', 'LIKE', "%$request->searchname%");
		}
		if (isset($request->search)) {
			$query->where('type', 'LIKE', "%$request->search%");
		}
		$query->orderBy('id', 'DESC');
		$items = $query->paginate($limit);
		$courses = Course::get();

		// $items = $query->with('lessions')->paginate($limit);
		$params =
			[
				'courses' => $courses,
				'items' => $items,
			];
		return view('admin.lessions.index', $params);
	}

	// Thêm
	public function create()
	{
		$this->authorize('create', Lession::class);
		$items = Course::get();
		$params = [
			'items' => $items,
		];
		return view('admin.lessions.create', $params);
	}
	public function store(LessionRequest $request)
	{
		try {

			$lessions = new Lession();
			$lessions->name = $request->name;
			$lessions->type = $request->type;
			$lessions->content = $request->content;
			$lessions->duration = $request->duration;
			$lessions->course_id = $request->course_id;

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
			// xử lý video 
			if ($request->hasFile('video_url')) {
				$file = $request->file('video_url');
				$fileName = time() . '_' . $file->getClientOriginalName();
				$file->storeAs('public/videos', $fileName);
				$lessions->video_url = $fileName;
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
			$courses = Course::get();

			$params =
				[
					'courses' => $courses,
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
		// dd(1);

		try {
			$items = Lession::findOrfail($id);
			$items->name = $request->name;
			$items->type = $request->type;
			$items->content = $request->content;
			$items->duration = $request->duration;
			$items->course_id = $request->course_id;


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
			// // xư lý video
			$existingVideo = $items->video_url; // Gán giá trị cho biến $existingVideo
			if ($request->hasFile('video_url')) {
				$file = $request->file('video_url');
				$fileName = time() . '_' . $file->getClientOriginalName();
				$file->storeAs('public/videos', $fileName);
				if ($existingVideo) {
					$oldFilePath = 'videos/' . $existingVideo;

					if (Storage::disk('public')->exists($oldFilePath)) {
						Storage::disk('public')->delete($oldFilePath);
					}
				}
				$items->video_url = $fileName;
			} else {
				$items->video_url = $existingVideo;
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
	public function show($id)
	{
		$item = Lession::find($id);
		$courses = Course::get();

		$params =
			[
				'courses' => $courses,
				'item' => $item,
			];
		return view('admin.lessions.show',  $params);
	}
}
