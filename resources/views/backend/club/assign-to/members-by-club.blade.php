@foreach ($clubs as $club)
    @php
        $assign_to_clubs = \App\Models\AssignToClub::leftjoin('club_members', 'club_members.id', '=', 'assign_to_clubs.club_member_id')
            ->leftJoin('club_designations', 'club_designations.id', '=', 'assign_to_clubs.club_designation_id')
            ->select('assign_to_clubs.*', 'club_members.name as member_name', 'club_members.student_id as student_id', 'club_members.email as email', 'club_members.status as member_status', 'club_designations.name as designations_name')
            ->where('club_id', $club->id)
            ->where('club_members.status', 1)
            ->orderBy('club_designations.id')
            ->get();
        //dd($assign_to_clubs);
    @endphp
    @if (count($assign_to_clubs) > 0)
        <tr>
            <td colspan="9" style="padding:15px;font-weight: bold;color: #3f8b62;">
                {{ $club->name }}
            </td>
        </tr>
        @forelse ($assign_to_clubs as $assign_to_club)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $assign_to_club->student_id }}</td>
                <td>{{ $assign_to_club->member_name }}</td>
                <td>{{ $assign_to_club->email }}</td>
                <td>{{ $assign_to_club->designations_name }}</td>
                <td>{{ @$assign_to_club->join_date ? date('d-M-Y', strtotime(@$assign_to_club->join_date)) : '' }}</td>
                <td>{{ @$assign_to_club->expire_date ? date('d-M-Y', strtotime(@$assign_to_club->expire_date)) : '' }}</td>
                <td>{!! $assign_to_club->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                <td>
                    <a href="{{ route('club.assign.to.club.edit', $assign_to_club->id) }}" class="btn btn-primary btn-sm " title="Edit Club"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm delete " style="cursor: pointer" id="delete" title="Delete" data-route="{{ route('club.assign.to.club.delete') }}" data-id="{{ $assign_to_club->id }}" data-token={{ csrf_token() }}><i class="fas fa-trash text-white"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No Data Found !</td>
            </tr>
        @endforelse
    @endif
@endforeach
