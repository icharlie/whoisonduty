<?php namespace App\Http\Controllers;

use App\Http\Requests\TopicStoreRequest;
use App\Http\Controllers\Controller;
use App\Topic;

class TopicsController extends Controller
{
	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = $this->topic->all();
		return view('topics.index', compact('topics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('topics.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TopicStoreRequest $request)
	{
		$this->topic->create($request->only('name'));
		return redirect('topics');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$topic = $this->topic->whereId($id)->first();
		return view('topics.edit', compact('topic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TopicStoreRequest $request)
	{
		$this->topic->whereId($id)->update($request->only('name'));

		return redirect('topics');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ($this->topic->destroy($id)) {
			return redirect('topics');
		}
	}

}
