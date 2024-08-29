@auth
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Admin</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach (\App\Models\User::all() as $user)
      <tr>
        <td>
          <a href="/admin/user?id={{ $user->id}}">{{ $user->name }}</a>
        </td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->info->admin == 1 ? 'Yes' : 'No' }}</td>
        <td style="text-align: center">
          <a href="/admin/entries?user={{ $user->id}}">Entries</a>
          |
          <a href="/admin/user/delete?id={{ $user->id }}"
            onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">
        <a href="/admin/user">Add New User</a>
      </td>
    </tr>
  </tfoot>
</table>
@endauth
