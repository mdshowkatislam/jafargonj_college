<table class="bn">
    <tr>
        <td>১ কপি পিপি সাইজের সত্যায়িত ছবি</td>
        <td><img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 150px; height: 150px;" alt=""></td>
        <td>পরীক্ষার্থীর স্বাক্ষর</td>
        <td><img src="{{ asset('/uploads/' . $data->data60) }}" style="width: auto; height: 100px;" alt="">
        তারিখঃ <br/> {{ @$data->data58 }}
        </td>
    </tr>
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
        <td colspan="3">{{ @$data->data18 }}</td>
    </tr>

</table>
