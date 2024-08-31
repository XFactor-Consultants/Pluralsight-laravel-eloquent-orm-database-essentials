<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntryController extends Controller
{
    public function add(Request $request) {
        $request->validate([
            'job_id' => 'required|filled',
            'entry_date' => 'required|date',
            'hours' => 'required|integer|max:24|min:0.1',
            'description' => 'nullable|max:255',
        ]);

        $data = $request->only('job_id', 'entry_date', 'hours', 'description');
        $data['user_id'] = Auth::user()->id;

        $entry = Entry::create($data);

        return back()->withSuccess('Entry added.');
    }

    public function edit(Request $request) {
        $request->validate([
            'id' => 'required|integer|filled',
            'job_id' => 'required|filled',
            'entry_date' => 'required|date',
            'hours' => 'required|decimal:0,1|max:24|min:0.1',
            'description' => 'nullable|max:255',
        ]);

        $data = $request->only('job_id', 'entry_date', 'hours', 'description');

        $entry = Entry::find($request->id);
        $entry->update($data);

        return redirect(route('entries'))
            ->withSuccess('Entry updated.');
    }

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|integer|filled',
        ]);

        $entry = Entry::find($request->id);
        $entry->delete();

        return back()->withSuccess('Entry deleted.');
    }

    public function approve(Request $request) {
        $request->validate([
            'id' => 'required|integer|filled',
        ]);

        $admin = Auth::user()->id;

        if (Approval::where([
            ['entry_id', $request->id],
            ['user_id', $admin]
        ])->exists()) {
            return back()
                ->withErrors('You\'ve already approved this entry.');
        }

        $approval = new Approval();
        $approval->entry_id = $request->id;
        $approval->user_id = $admin;
        $approval->save();

        return back()
            ->withSuccess('Entry approved.');
    }
}
