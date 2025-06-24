<table class="bn">
    <tr>
        <td>Attach 1copy pp size attested photograph</td>
        <td><img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 150px; height: 150px;" alt=""></td>
        <td>Signature of Student</td>
        <td><img src="{{ asset('/uploads/' . $data->data60) }}" style="width: auto; height: 100px;" alt="">
        Date: <br/> {{ @$data->data58 }}
        </td>
    </tr>
    <tr>
        <td>Admission Test Roll No</td>
        <td>{{ @$data->data1 }}</td>
        <td>Name (Block Letter)</td>
        <td>{{ @$data->data2 }}</td>
    </tr>
    <tr>
        <td>Father's Name</td>
        <td>{{ @$data->data3 }}</td>
        <td>Mother's Name</td>
        <td>{{ @$data->data4 }}</td>
    </tr>
    <tr>
        <td>Permanent Address</td>
        <td>{{ @$data->data5 }}</td>
        <td>Present Address</td>
        <td>{{ @$data->data6 }}</td>
    </tr>
    <tr>
        <td>Place of Birth</td>
        <td>{{ @$data->data7 }}</td>
        <td>Nationality</td>
        <td>{{ @$data->data8 }}</td>
    </tr>
    <tr>
        <td>Date of Birth (As per SSC Certificate)</td>
        <td>{{ @$data->data9 }}</td>
        <td></td>
        <td></td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">Academic Qualification</h5>

<table class="bn">
    <tr>
        <th>Name of Exam</th>
        <th>Name of Institution</th>
        <th>Passing Year</th>
        <th>Board/ University</th>
        <th>Group/Specialization</th>
        <th>Marks/CGPA</th>
    </tr>
    <tr>
        <td>SSC</td>
        <td>{{ @$data->data10 }}</td>
        <td>{{ @$data->data11 }}</td>
        <td>{{ @$data->data12 }}</td>
        <td>{{ @$data->data13 }}</td>
        <td>{{ @$data->data14 }}</td>
    </tr>
    <tr>
        <td>HSC</td>
        <td>{{ @$data->data15 }}</td>
        <td>{{ @$data->data16 }}</td>
        <td>{{ @$data->data17 }}</td>
        <td>{{ @$data->data18 }}</td>
        <td>{{ @$data->data19 }}</td>
    </tr>
    <tr>
        <td>BSc in Textile Engg./Technology</td>
        <td>{{ @$data->data20 }}</td>
        <td>{{ @$data->data21 }}</td>
        <td>{{ @$data->data22 }}</td>
        <td>{{ @$data->data23 }}</td>
        <td>{{ @$data->data24 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">Choice of the Department for admission</h5>

<table>
    <tr>
        <td>{{ @$data->data25 }}</td>
    </tr>
</table>


<h5 class="p-1 bn mt-2">Experience (if any)</h5>

<table class="bn">
    <tr>
        <th>Name of Exam</th>
        <th>Name of Institution</th>
        <th>Passing Year</th>
        <th>Board/ University</th>
        <th>Group/Specialization</th>
        <th>Marks/CGPA</th>
    </tr>
    <tr>
        <td>SSC</td>
        <td>{{ @$data->data10 }}</td>
        <td>{{ @$data->data11 }}</td>
        <td>{{ @$data->data12 }}</td>
        <td>{{ @$data->data13 }}</td>
        <td>{{ @$data->data14 }}</td>
    </tr>
    <tr>
        <td>HSC</td>
        <td>{{ @$data->data15 }}</td>
        <td>{{ @$data->data16 }}</td>
        <td>{{ @$data->data17 }}</td>
        <td>{{ @$data->data18 }}</td>
        <td>{{ @$data->data19 }}</td>
    </tr>
    <tr>
        <td>BSc in Textile Engg./Technology</td>
        <td>{{ @$data->data20 }}</td>
        <td>{{ @$data->data21 }}</td>
        <td>{{ @$data->data22 }}</td>
        <td>{{ @$data->data23 }}</td>
        <td>{{ @$data->data24 }}</td>
    </tr>
</table>