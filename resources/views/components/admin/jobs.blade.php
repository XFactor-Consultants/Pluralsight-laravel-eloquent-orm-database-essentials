@auth
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Billing Code</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach (\App\Models\JobCode::all() as $job)
      <tr>
        <td>
          <a href="/admin/job?id={{ $job->id }}'">{{ $job->name }}</a>
        </td>
        <td>{{ $job->billing_code }}</td>
        <td style="text-align: center">
          <a href="/admin/job/delete?id={{ $job->id }}"
            onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">
        <a href="/admin/job">Add New Job</a>
      </td>
    </tr>
  </tfoot>
</table>
@endauth
