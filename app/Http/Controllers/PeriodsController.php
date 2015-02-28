<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Topic;
use App\Period;
use App\Http\Requests\PeriodStoreRequest;

class PeriodsController extends Controller
{
    private $period;
    private $user;

    public function __construct(Period $period, User $user, Topic $topic)
    {
        $this->period = $period;
        $this->user = $user;
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $periods = $this->period->with('user')->get();
        return view('periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->user->lists('name', 'id');
        $topics = $this->topic->lists('name', 'id');
        return view('periods.create', compact('users', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PeriodStoreRequest $request)
    {
        $this->period->create($request->sanitize());

        return redirect('periods');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $period = $this->period->whereId($id)->first();
        $users = $this->user->lists('name', 'id');
        $topics = $this->topic->lists('name', 'id');
        return view('periods.edit', compact('period', 'users', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PeriodStoreRequest $request)
    {
        $this->period->whereId($id)->update($request->sanitize());

        return redirect('periods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->period->destroy($id)) {
            return redirect('periods');
        }
    }

}
