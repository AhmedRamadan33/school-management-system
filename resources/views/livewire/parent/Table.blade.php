<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showform" type="button">add parent</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>Email</th>
            <th>Father Name</th>
            <th>Father National ID</th>
            <th>Father Phone</th>
            <th>Father Job</th>
            <th>Processes</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($my_parents as $my_parent)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->father_name }}</td>
                <td>{{ $my_parent->father_national_id }}</td>
                <td>{{ $my_parent->father_phone	}}</td>
                <td>{{ $my_parent->father_job }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="Edit"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="Delete"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
