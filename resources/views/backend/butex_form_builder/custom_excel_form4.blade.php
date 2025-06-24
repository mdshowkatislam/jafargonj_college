<table class="table bn" id="dataTable2">
    <thead>
        <tr>
            <th>Title</th>
            <th>Data</th>
            <th>Title</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Student ID</td>
            <td>{{ @$data->data1 }}</td>
            <td>Student Name</td>
            <td>{{ @$data->data2 }}</td>
        </tr>
        <tr>
            <td>Department </td>
            <td>{{ @$data->data3 }}</td>
            <td>Name of the Program</td>
            <td>{{ @$data->data4 }}</td>
        </tr>
        <tr>
            <td>Admission Session</td>
            <td>{{ @$data->data5 }}</td>
            <td>Batch</td>
            <td>{{ @$data->data6 }}</td>
        </tr>
        <tr>
            <td>CGPA Achieved </td>
            <td>{{ @$data->data7 }}</td>
            <td>Studentship Ended on</td>
            <td>{{ @$data->data8 }}</td>
        </tr>
        <tr>
            <td>Current Status </td>
            <td>@if(@$data->data9 ==1) Course Work, @endif @if(@$data->data10 ==1) Thesis Work @endif </td>
            <td>Number of Incomplete Courses</td>
            <td>{{ @$data->data11}}</td>
        </tr>
        <tr>
            <td>Revised Studentship up to [Phase-1]</td>
            <td>{{ @$data->data12 }}</td>
            <td>Revised Studentship up to [Phase-2]</td>
            <td>{{ @$data->data13 }}</td>
        </tr>
        <tr>
            <td>Revised Studentship up to [Phase-3]</td>
            <td>{{ @$data->data14 }}</td>
            <td>Revised Studentship up to [Phase-4]</td>
            <td>{{ @$data->data15 }}</td>
        </tr>
        <tr>
            <td>Revised Studentship up to [Phase-5]</td>
            <td>{{ @$data->data16 }}</td>
            <td>Supervisor's name</td>
            <td>{{ @$data->data17 }}</td>
        </tr>
        <tr>
            <td>Requested Revision of Studentship up to</td>
            <td>{{ @$data->data18 }}</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
