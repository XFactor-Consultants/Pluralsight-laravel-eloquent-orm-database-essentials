@extends('layouts.default')
@section('title', 'Entries')
@section('content')

<table>
  <thead>
    <tr>
      <th>Job</th>
      <th>Date</th>
      <th>Hours</th>
      <th>Description</th>
      <th>Approved</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach (Auth::user()->entries as $entry)
      <tr>
        <td>{{ $entry->job->name }}</td>
        <td>{{ $entry->entry_date }}</td>
        <td>{{ $entry->hours }}</td>
        <td>{{ $entry->description }}</td>
        <td style="text-align: center">
          {!! $entry->approvals->count() > 0 ? '&checkmark;' : '' !!}
        </td>
        <td>
          <a href="/entry?edit={{ $entry->id }}">Edit</a>
          |
          <a href="?delete={{ $entry->id }}">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="100%">
        <a href="/entry">Add Entry</a>
      </td>
    </tr>
  </tfoot>
</table>

@endsection
