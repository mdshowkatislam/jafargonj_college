<style>
    .first_page {
        width: 100%;
        margin: 0 auto;
        padding: 5px 5px;
    }
    h1, h2, p {
        margin: 0;
        padding: 0;
    }
    .header {
        text-align: left;
        margin-bottom: 20px;
    }
    .header p {
        margin: 5px 0;
    }
    .subject {
        font-weight: bold;
        margin: 10px 0;
    }
    .content {
        margin: 20px 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #000;
        text-align: left;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0;
    }
    .signature-section {
        margin: 30px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .signature-section div {
        text-align: center;
        width: 30%;
    }
    table td:first-child {
        text-align: right;
    }
</style>

<div class="first_page">
    <div class="header">
        <p style="font-size: 17px;">Date: {{ @$data->data58 }}</p>
    </div>
    <p><span style="font-weight: bold; font-size: 18px;">The Registrar</span><br>Bangladesh University of Textiles</p>
    <p class="subject" style="font-size: 18px;">Subject: About the Extension of Studentship</p>
    <p style="font-size: 17px;">Sir,</p>
    <p style="font-size: 17px; margin-bottom: 10px;">I am presenting my particulars below and requesting an extension of my studentship.</p>

    <table>
        <tr>
            <td style="font-size: 15px; width: 40%;">Student ID</td>
            <td style="font-size: 15px; width: 60%;">{{ @$data->data1 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Student Name</td>
            <td style="font-size: 15px;">{{ @$data->data2 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Department</td>
            <td style="font-size: 15px;">{{ @$data->data3 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Name of the Program</td>
            <td style="font-size: 15px;">{{ @$data->data4 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Admission Session</td>
            <td style="font-size: 15px;">{{ @$data->data5 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Batch</td>
            <td style="font-size: 15px;">{{ @$data->data6 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">CGPA Achieved</td>
            <td style="font-size: 15px;">{{ @$data->data7 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Studentship Ended on</td>
            <td style="font-size: 15px;">{{ @$data->data8 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Current Status</td>
            <td style="font-size: 15px;">
            @if(@$data->data9 ==1) Course Work, @endif @if(@$data->data10 ==1) Thesis Work @endif  
            </td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Number of Incomplete Courses</td>
            <td style="font-size: 15px;">{{ @$data->data11 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Revised Studentship up to [Phase-1]</td>
            <td style="font-size: 15px;">{{ @$data->data12 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Revised Studentship up to [Phase-2]</td>
            <td style="font-size: 15px;">{{ @$data->data13 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Revised Studentship up to [Phase-3]</td>
            <td style="font-size: 15px;">{{ @$data->data14 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Revised Studentship up to [Phase-4]</td>
            <td style="font-size: 15px;">{{ @$data->data15 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Revised Studentship up to [Phase-5]</td>
            <td style="font-size: 15px;">{{ @$data->data16 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Name of the Supervisor</td>
            <td style="font-size: 15px;">{{ @$data->data17 }}</td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Requested Revision of Studentship up to</td>
            <td style="font-size: 15px;">{{ @$data->data18 }}</td>
        </tr>
    </table>

    <p style="font-size: 17px;">I hope to make noticeable progress within the extended period and be able to fulfill the requirements for the intended degree.</p>

    <div style="text-align: end; margin: 20px;">
        <div>
        <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt=""><br>
            <span style="text-align: right; font-size: 17px;">Signature of the Student</span>
        </div>
    </div>
    <div>
        <p style="border-bottom: 1px solid #898585"></p>
        <div style="display: flex;">
            <div style="padding: 10px 60px 10px 10px; font-size: 17px;">I believe, the student has potential to complete the program and thereby recommending the requested extension</div>
            <div style="padding: 10px 60px 10px 10px; font-size: 17px;">I believe, the student has potential to complete the program and thereby recommending the requested extension</div>
        </div>
    </div>
    <div class="signature-section">
        <div>
            ___________________________<br>
            <span style="font-weight: bold;">Supervisor</span>
        </div>
        <div>
            ___________________________<br>
            <span style="font-weight: bold;">Head of the Department</span>
        </div>
    </div>

    <div>
        <p style="border-bottom: 1px solid #898585"></p>
        <div style="padding: 10px 60px 10px 10px; font-size: 17px">I believe, the student has potential to complete the program and thereby recommending the requested extension</div>
    </div>

    <div style="margin-top: 30px;">
        ___________________________<br>
        <span style="margin-left: 3.8rem; font-weight: bold;">Dean of the Faculty</span>
    </div>

</div>