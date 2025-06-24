<style>
    .border_custom{
        border-bottom: 2px dotted #000;
    }
    .font-16{
        font-size: 16px;
    }
    .font-17{
        font-size: 17px;
    }
    .font-18{
        font-size: 18px;
    }
    .font-19{
        font-size: 19px;
    }
    .font-20{
        font-size: 20px;
    }

    @media print {
        .page-break {
            /* page-break-before: always;  */
            page-break-after: always;  /* Forces a page break after this element */
        }
    }

</style>

<table>
    <tr>
        <td style="border: none;">
            <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 180px; height: 180px;" alt="">
        </td>
        <td style="border: none;">
            <h4 style="text-align: center; font-size: 22px; margin-top: 30px; font-weight: 600;">BANGLADESH UNIVERSITY OF TEXTILES</h4>
            <h6 style="text-align: center; font-size: 20px;">Tejgaon, Dhaka-1208</h6>
            <div style="text-align: center;">
                <img src="{{ asset('/logo.png') }}" style="width: 130px; height: 120px;" alt="">
            </div>
            <h5 style="text-align: center; font-size: 22px; font-weight: 600;">MSc in Textile Engineering Program</h5>
            <h6 style="text-align: center; font-size: 22px; font-weight: 600;">Session: 2024</h6>
            <h6 style="text-align: center; font-size: 22px; font-weight: 600;">Student Admission Information Form</h6>
        </td>
        <td style="border: none;">
            <table>
                <tr>
                    <td style="width: 150px; font-size: 17px;"><b>Admission Test Roll No</b></td>
                    <td style="width: 5px; font-size: 17px;"><b>:</b></td>
                    <td style="width: 100px; font-size: 17px;"><b>{{ @$data->data1 }}</b></td>
                </tr>
                <tr>
                    <td style="width: 150px; font-size: 17px;"><b>Merit Position</b></td>
                    <td style="font-size: 17px;"><b>:</b></td>
                    <td style="width: 100px; font-size: 17px;"><b>{{ @$data->data2 }}</b></td>
                </tr>
                <tr>
                    <td style="width: 150px; font-size: 17px;"><b>Name of the Department</b></td>
                    <td style="font-size: 17px;"><b>:</b></td>
                    <td style="width: 100px; font-size: 17px;"><b>{{ @$data->data3 }}</b></td>
                </tr>
                <tr>
                    <td style="width: 150px; font-size: 17px;"><b>Student ID</b></td>
                    <td style="font-size: 17px;"><b>:</b></td>
                    <td style="width: 100px; font-size: 17px;"><b>{{ @$data->data4 }}</b></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div style="margin-top: 10px;">
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px;">1. Student's Name : In Bengali <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data5 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div style="margin-left: 225px; font-weight: 600; font-size: 17px; margin-bottom: 15px;">(As per SSC/Equivalent Certificate)</div>
    <div class="font-20" style="margin-left: 175px; font-weight: 600;">In English <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data6 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div style="margin-left: 250px; font-size: 20px; margin-bottom: 15px;">(Block Letter)</div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">2. Father's Name : In Bengali <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data7 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="margin-left: 175px; font-weight: 600;">In English <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data8 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div style="margin-left: 250px; font-size: 17px;">(Block Letter)</div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">3. Mother's Name : In Bengali <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data9 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="margin-left: 175px; font-weight: 600;">In English <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data10 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>.</div>
    <div style="margin-left: 250px; font-size: 17px;">(Block Letter)</div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px;">4. Date of Birth : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data11 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>.</div>
    <div style="margin-left: 200px; font-size: 17px; margin-bottom: 15px;">(As per SSC/Equivalent Certificate)</div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">5. Permanent Address : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data12 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">6. Mailing Address : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data13 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">7. Student's Mobile No : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data14 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>.</div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">8. Father's/Mother's Mobile No : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data15 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">9. Nationality : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data16 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>  Religion: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data17 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">10. Name & Address and Phone/Mobile no of Local Guardian in case of Emergency : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data18 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">11. Blood Group : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data19 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    
    <div class="page-break"></div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 5px; margin-bottom: 15px;">12. Academic Information:</div>

        <div class="">
            <table class="bn font-20">
                <tr>
                    <th style="text-align: center; font-weight: 600;">Name of Exam.</th>
                    <th style="text-align: center; font-weight: 600;">Name of Institute</th>
                    <th style="text-align: center; font-weight: 600;">Board/University</th>
                    <th style="text-align: center; font-weight: 600;">Year of Exam</th>
                    <th style="text-align: center; font-weight: 600;">Exam Roll</th>
                    <th style="text-align: center; font-weight: 600;">Division/GPA/Class/CGPA</th>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: 600;">SSC/Equivalent</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data20 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data21 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data22 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data23 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data24 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: 600;">HSC/Equivalent</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data25 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data26 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data27 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data28 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data29 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: 600;">BSc in Textile</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data30 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data31 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data32 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data33 }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ @$data->data34 }}</td>
                </tr>
            </table>
        </div>

    <div class="font-20" style="padding: 5px; font-weight: 600; margin-top: 20px;">13. Sports/Cultural/Other Activities (Should be mentioned if received prize):</div>
    <p style="margin-left: 30px; font-size: 20px;">Sports: {{ @$data->data35 }}</p>
    <p style="margin-left: 30px; font-size: 20px;">Singing: {{ @$data->data36 }} </p>
    <p style="margin-left: 30px; font-size: 20px;">Debate: {{ @$data->data37 }}</p>
    <p style="margin-left: 30px; font-size: 20px;">Others: {{ @$data->data38 }}</p>


    <div style="margin-top: 20px;">
        <h5 style="text-align: center; font-weight: 600; font-size: 23px;">Declaration</h5>
        <p style="text-align: center; font-weight: 600; margin-auto; font-size: 20px;">I do hereby declare that I will abide by all the Rules & Regulation of this University after getting admission and I will not involve in any activity subversive of the State or of discipline.</p>
    </div>

    <table>
        <tr>
            <td style="border: none; font-size: 22px;">Date: {{ @$data->data58 }}</td>
            <td style="text-align: right; border: none;">
                <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt="">
                <div style="font-size: 20px;">......................................................</div>
                <div style="font-size: 22px;">Signature of Student</div>
            </td>
        </tr>
        <tr>
            <td style="border: none;">
                <div style="text-align: center; margin-top: 60px; font-size: 22px;">
                    All the papers have been scrutinized.
                </div>
            </td>
            <td style="border: none;">
                <div style="text-align: center; margin-top: 60px; font-size: 22px;">Approved for Admission</div>
            </td>
        </tr>
        <tr>
            <td style="border: none;">
                <div style="text-align: center; margin-top: 60px; font-size: 22px;">
                    Scrutinizer
                </div>
            </td>
            <td style="border: none;">
                <div style="text-align: center; margin-top: 60px; font-size: 22px;">Register</div>
            </td>
        </tr>
    </table>

    <div style="margin-top: 60px;">
        <p style="text-align: center; font-weight: 600; font-size: 20px;">[N.B. (a) Attested copies of all Academic Transcripts and Testimonial of the last Educational Institute should be attached. (b) In case of changing Permanent/Mailing address and Mobile No, should be informed University Authority.]</p>
    </div>

</div>
