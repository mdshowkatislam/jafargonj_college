@foreach ($alumnis as $alumni)
    @php
        $assign_to_alumnis = \App\Models\AssignToAlumni::leftjoin('alumni_members', 'alumni_members.id', '=', 'assign_to_alumnis.alumni_member_id')
            ->leftJoin('alumni_designations', 'alumni_designations.id', '=', 'assign_to_alumnis.alumni_designation_id')
            ->select('assign_to_alumnis.*', 'alumni_members.name as member_name', 'alumni_members.student_id as student_id', 'alumni_members.email as email', 'alumni_members.status as member_status', 'alumni_designations.name as designations_name')
            ->where('alumni_id', $alumni->id)
            ->where('alumni_members.status', 1)
            ->orderBy('alumni_designations.id')
            ->get();
        //dd($assign_to_alumnis);
    @endphp
    @if (count($assign_to_alumnis) > 0)
        <tr>
            <td colspan="9" style="padding:15px;font-weight: bold;color: #3f8b62;">
                {{ $alumni->name }}
            </td>
        </tr>
        @forelse ($assign_to_alumnis as $assign_to_alumni)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $assign_to_alumni->student_id }}</td>
                <td>{{ $assign_to_alumni->member_name }}</td>
                <td>{{ $assign_to_alumni->email }}</td>
                <td>{{ $assign_to_alumni->designations_name }}</td>
                <td>{{ @$assign_to_alumni->join_date ? date('d-M-Y', strtotime(@$assign_to_alumni->join_date)) : '' }}</td>
                <td>{{ @$assign_to_alumni->expire_date ? date('d-M-Y', strtotime(@$assign_to_alumni->expire_date)) : '' }}</td>
                <td>{!! $assign_to_alumni->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                <td>
                    <a href="{{ route('alumni.assign.to.alumni.edit', $assign_to_alumni->id) }}" class="btn btn-primary btn-sm " title="Edit Alumni"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm delete " style="cursor: pointer" id="delete" title="Delete" data-route="{{ route('alumni.assign.to.alumni.delete') }}" data-id="{{ $assign_to_alumni->id }}" data-token={{ csrf_token() }}><i class="fas fa-trash text-white"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No Data Found !</td>
            </tr>
        @endforelse
    @endif
@endforeach
