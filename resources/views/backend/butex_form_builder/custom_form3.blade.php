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
        <td>Admission Test Roll No</td>
        <td>{{ @$data->data1 }}</td>
        <td>Merit Position</td>
        <td>{{ @$data->data2 }}</td>
    </tr>
    <tr>
        <td>Name of the Department</td>
        <td>{{ @$data->data3 }}</td>
        <td>Student ID</td>
        <td>{{ @$data->data4 }}</td>
    </tr>
    <tr>
        <td>Student's Name (In Bengali)</td>
        <td>{{ @$data->data5 }}</td>
        <td>Student's Name (In English)</td>
        <td>{{ @$data->data6 }}</td>
    </tr>
    <tr>
        <td>Father's Name (In Bengali)</td>
        <td>{{ @$data->data7 }}</td>
        <td>Father's Name (In English)</td>
        <td>{{ @$data->data8 }}</td>
    </tr>
    <tr>
        <td>Mother's Name (In Bengali) </td>
        <td>{{ @$data->data9 }}</td>
        <td>Mother's Name (In English)</td>
        <td>{{ @$data->data10}}</td>
    </tr>
    <tr>
        <td>Date of Birth</td>
        <td>{{ @$data->data11 }}</td>
        <td>Permanent Address</td>
        <td>{{ @$data->data12 }}</td>
    </tr>
    <tr>
        <td>Mailing Address</td>
        <td>{{ @$data->data13 }}</td>
        <td>Student's Mobile No</td>
        <td>{{ @$data->data14 }}</td>
    </tr>
    <tr>
        <td>Father's/Mother's Mobile No</td>
        <td>{{ @$data->data15 }}</td>
        <td>Nationality</td>
        <td>{{ @$data->data16 }}</td>
    </tr>
    <tr>
        <td>Religion</td>
        <td>{{ @$data->data17 }}</td>
        <td>Blood Group</td>
        <td>{{ @$data->data19 }}</td>
    </tr>
    <tr>
        <td>Name & Address and Phone/Mobile no of Local Guardian in case of Emergency</td>
        <td colspan="3">{{ @$data->data18 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">Academic Information</h5>

<table class="bn">
    <tr>
        <th>Name of Exam</th>
        <th>Name of Institute</th>
        <th>Board/ University</th>
        <th>Year of Exam</th>
        <th>Exam. Roll</th>
        <th>Division/GPA/Class/CGPA</th>
    </tr>
    <tr>
        <td>SSC/Equivalent</td>
        <td>{{ @$data->data20 }}</td>
        <td>{{ @$data->data21 }}</td>
        <td>{{ @$data->data22 }}</td>
        <td>{{ @$data->data23 }}</td>
        <td>{{ @$data->data24 }}</td>
    </tr>
    <tr>
        <td>HSC/Equivalent</td>
        <td>{{ @$data->data25 }}</td>
        <td>{{ @$data->data26 }}</td>
        <td>{{ @$data->data27 }}</td>
        <td>{{ @$data->data28 }}</td>
        <td>{{ @$data->data29 }}</td>
    </tr>
    <tr>
        <td>BSc in Textile</td>
        <td>{{ @$data->data30 }}</td>
        <td>{{ @$data->data31 }}</td>
        <td>{{ @$data->data32 }}</td>
        <td>{{ @$data->data33 }}</td>
        <td>{{ @$data->data34 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">Sports/Cultural/Other Activities (Should be mentioned if received prize):</h5>

<table class="bn">
    <tr>
        <td style="width: 150px;">Sports</td>
        <td>{{ @$data->data35 }}</td>
    </tr>
    <tr>
        <td>Singing</td>
        <td>{{ @$data->data36 }}</td>
    </tr>
    <tr>
        <td>Debate</td>
        <td>{{ @$data->data37 }}</td>
    </tr>
    <tr>
        <td>Others</td>
        <td>{{ @$data->data38 }}</td>
    </tr>
</table>
