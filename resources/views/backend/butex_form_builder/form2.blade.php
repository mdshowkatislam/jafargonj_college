<style>
    .border_custom{
        border-bottom: 2px dotted #000;
    }

    .first_page {
        width: 100%;
        padding: 10px;
        text-align: center;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .second_page {
        width: 100%;
        padding: 20px;
        text-align: left;
    }
    .form-section {
        margin-top: 20px;
    }
    .form-section table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .form-section table, .form-section th, .form-section td {
        border: 1px solid black;
    }
    .form-section th, .form-section td {
        padding: 5px;
        text-align: center;
    }
    .form-section .input-line {
        display: block;
    }
    .form-section label {
        display: inline-block;
        width: 200px;
    }
    .signature {
        margin-top: 10px;
        text-align: right;
    }
    .third_page {
        width: 100%;
        padding: 20px;
        text-align: left;
    }
    .info {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0px;
    }
    .info .photo-box {
        border: 1px solid #000;
        width: 150px;
        height: 200px;
        text-align: center;
        line-height: 200px;
        font-size: 12px;
    }
    .details {
        width: 100%;
    }
    .details p {
        margin: 5px 0;
        font-size: 14px;
    }
</style>

{{-- 1st page --}}
<div class="first_page">
    <div class="header">
        <div class="attach_img" 
            style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    ">
          <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 200px; height: 200px;" alt="">
        </div>
        
        <img src="{{ asset('/logo.png') }}" style="width: 200px; height: 180px;;" alt="">
        <div style="border: 1px solid #000; padding: 5px; font-size: 20px;">
            <b>Admission Test Roll No: <br/>
            {{ @$data->data1 }}</b>
        </div>
    </div>
    <br><br><br>
    <div class="first_page_body" style="font-weight: bold;">
        <h1 class="bn" style="font-size: 3rem; font-weight: bold; text-transform: uppercase;">Bangladesh University of Textiles</h1>
        <p style="font-size: 25px;">Tejgaon, Dhaka-1208.</p>
        
        <div class="subtitle" style="margin: 180px 0 20px;">
            <h4 style="font-weight: bold; margin-bottom: 20px; font-size: 28px;">Application Form</h4>
            <h4 style="font-weight: bold; font-size: 28px;">Session: 2024</h4>
        </div>
        <div class="program" style="margin: 220px 0 20px;">
            <h4 style="font-weight: bold; font-size: 27px;">M. Sc. in Textile Engineering /<br>
                M. Sc. in Sustainability in Textiles Program</h4>
        </div>
        <div class="website" style="margin: 100px auto; font-size: 25px;">www.butex.edu.bd</div>
    </div>
</div>
{{-- end 1st page --}}

<div class="page-break"></div>

{{-- 2nd page --}}
<div class="second_page">
    <div class="form-section" style="margin-bottom: 0px;">
        <p style="text-align: center; font-weight: bold; font-size: 25px;">(To be filled-up by the Applicant)</p>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">1. Name (Block Letter)</label>
            <p style="width: 70%;"> : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data2 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
        </div>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">2. Father’s Name</label>
            <p style="width: 70%;"> : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data3 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
        </div>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">3. Mother’s Name</label>
            <p style="width: 70%;"> : <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data4 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
        </div>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">4. Address:</label>
            <div class="inside-part" style="width: 70%; color: black;"> : 
                (A) Permanent: <span class="border_custom"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data5 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
               
                <br>(B) Present: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data6 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
               
                <br>Mobile: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data32 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            </div>
            </div>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">5. Place of Birth:</label>
            <p style="width: 70%;">
            <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data7 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
                <span>6. Nationality: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data8 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span>
            </p>
        </div>
        <div class="input-line" style="display: flex; font-size: 20px;">
            <label style="width: 30%">7. Date of Birth: <br><span style="font-size: 17px;">(As per SSC Certificate)</span></label>
            <p style="width: 70%;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data9 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span></p>
        </div>
        <div class="input-line">
            <label style="width: 30%; font-size: 20px;">8. Academic Qualification:</label>
        </div>
        
        <table>
            <tr>
                <th style="font-size: 18px;">Name of Exam</th>
                <th style="font-size: 18px;">Name of the Institution</th>
                <th style="font-size: 18px;">Passing Year</th>
                <th style="font-size: 18px;">Board/University</th>
                <th style="font-size: 18px;">Group/Specialization</th>
                <th style="font-size: 18px;">Marks/CGPA</th>
            </tr>
            <tr>
                <td style="font-size: 18px;">SSC</td>
                <td style="font-size: 18px;">{{ @$data->data10 }}</td>
                <td style="font-size: 18px;">{{ @$data->data11 }}</td>
                <td style="font-size: 18px;">{{ @$data->data12 }}</td>
                <td style="font-size: 18px;">{{ @$data->data13 }}</td>
                <td style="font-size: 18px;">{{ @$data->data14 }}</td>
            </tr>
            <tr>
                <td style="font-size: 18px;">HSC</td>
                <td style="font-size: 18px;">{{ @$data->data15 }}</td>
                <td style="font-size: 18px;">{{ @$data->data16 }}</td>
                <td style="font-size: 18px;">{{ @$data->data17 }}</td>
                <td style="font-size: 18px;">{{ @$data->data18 }}</td>
                <td style="font-size: 18px;">{{ @$data->data19 }}</td>
            </tr>
            <tr>
                <td style="font-size: 18px;">B.Sc. in Textile Engg./Technology</td>
                <td style="font-size: 18px;">{{ @$data->data20 }}</td>
                <td style="font-size: 18px;">{{ @$data->data21 }}</td>
                <td style="font-size: 18px;">{{ @$data->data22 }}</td>
                <td style="font-size: 18px;">{{ @$data->data23 }}</td>
                <td style="font-size: 18px;">{{ @$data->data24 }}</td>
            </tr>
        </table>
        <p style="padding: 10px 10px 0px; font-size: 18px;">* Should be mentioned group (Science/Commerce/Arts) and specialized subject in 4<sup>th</sup> year.</p>
        <div class="input-line" style="display: flex; font-size: 19px;">
            <label style="width: 33%">9. Choice of the Department for admission:</label>
            <p style="width: 66%;"> <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data25 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span></p>
        </div>
        <div class="input-line">
            <label style="font-size: 19px;">10. Experience (if any):</label>
        </div>
        <table>
            <tr>
                <th style="font-size: 18px;">SL</th>
                <th style="font-size: 18px;">Name of the Education/Industry/Research Institute</th>
                <th style="font-size: 18px;">Duration of Service</th>
                <th style="font-size: 18px;">Description of Experience</th>
            </tr>
            <tr>
                <td style="font-size: 18px;">1.</td>
                <td style="font-size: 18px;">{{ @$data->data26 }}</td>
                <td style="font-size: 18px;">{{ @$data->data27 }}</td>
                <td style="font-size: 18px;">{{ @$data->data28 }}</td>
            </tr>
            <tr>
                <td style="font-size: 18px;">2.</td>
                <td style="font-size: 18px;">{{ @$data->data29 }}</td>
                <td style="font-size: 18px;">{{ @$data->data30 }}</td>
                <td style="font-size: 18px;">{{ @$data->data31 }}</td>
            </tr>
        </table>

        <div class="input-line" style="margin-top: 6px;">
            <label style="width: 100%; font-size: 19px;">11. Research Plan should be submitted more than 500 words:</label>
            <p style="font-weight: 400; font-size: 18px;">I declare that all the above information are correct and I assure that I will abide by all the rules and regulations of the University.</p>
        </div>

        <div class="signature" style="text-align:right;">
            <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt=""><br>
            _______________________
            <br>
            <p style="padding: 5px 30px; font-weight: bold; font-size: 18px;">Signature of Applicant</p>
        </div>
        <div class="form-section">
            <table>
                <tr>
                    <th>Written Test</th>
                    <th>Department</th>
                    <th>Merit Position</th>
                    <th>Signature of Tabulator</th>
                </tr>
                <tr>
                    <td style="height: 30px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <p style="margin-top: 20px; font-size: 19px;">The Applicant has been selected for getting admission in the department of {{ @$data->data25 }}</p>
        <div class="signature">
            _______________________
            <br>
            <p style="padding: 0px 10px 0; font-weight: bold; font-size: 18px;">Signature of Chairman</p>
            <p style="padding: 0; margin: 0; font-size: 18px;">Admission Co-Ordination Committee</p>
        </div>
    </div>
</div>
{{-- end 2nd page --}}

<div class="page-break"></div>

{{-- 3rd page --}}
<div class="third_page">
    <div class="header" style="display: flex">
        <div class="logo" style="width: 15%; margin-top: -100px;">
            <img src="{{ asset('/logo.png') }}" style="width: 170px;" alt="">
        </div>
        <div class="third_page_header_middle" style="width: 60%;">
            <h1 style="font-size: 2rem; font-weight: bold; text-transform: uppercase;">Bangladesh University of Textiles</h1>
            <p style="text-align: center; margin-bottom: 30px; font-size: 20px;">Tejgaon, Dhaka-1208.</p>
            <div class="subtitle" style="text-align: center; font-size: 22px; font-weight: bold; margin-bottom: 10px;">Admit Card of Admission Test</div>
            <p style="text-align: center; font-size: 20px; font-weight: bold;">M. Sc. in Textile Engineering /<br>M. Sc. in Sustainability in Textiles Program</p>
            <p style="text-align: center; font-size: 20px; font-weight: bold;">(Session: 2024)</p>
        </div>
        <div style="width: 25%; margin-top: 20px;">
            <div class="third_page_box"  style="border: 1px solid #000; font-size: 18px; padding: 5px; margin-bottom: 10px;">
                <b>Admission Test Roll No: <br/> {{ @$data->data1 }}</b>
            </div>
            <div class="photo-box"
                style="display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-left: 10px;">
               <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 200px; height: 200px;" alt="">
            </div>
        </div>
    </div>
    

    <div class="info">
        <div class="details">
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">1. Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data2 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">2. Father’s Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data3 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">3. Mother’s Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data4 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">4. Date of Examination :</label>
                <p style="width: 74%; font-size: 18px;"></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">5. Name of Exam. Center :</label>
                <p style="width: 74%; font-size: 18px;"> <b>Bangladesh University of Textiles</b></p>
            </div>
            <div class="input-line" style="display: flex;">
                <div class="third_page_part" style="width: 60%; display: flex;">
                    <label style="width: 43%; font-size: 18px;">6.Signature of Applicant :</label>
                    <p style="width: 50%;">
                        <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt="">
                    </p>
                </div>
                <div class="third_page_second_part" style="width: 39%">
                    <p style="padding: 0px 40px; font-weight: bold; font-size: 19px;">Responsible Officer</p>
                    <p style="padding: 0; margin: 0; font-size: 19px">Admission Co-ordination Committee</p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="header" style="display: flex; margin-top: 30px;">
        <div class="logo" style="width: 15%;">
            <img src="{{ asset('/logo.png') }}" style="width: 100x;" alt="">
        </div>
        <div class="third_page_header_middle" style="width: 60%;">
            <h1 style="font-size: 2rem; font-weight: bold; text-transform: uppercase;">Bangladesh University of Textiles</h1>
            <p style="text-align: center; margin-bottom: 20px; font-size: 22px;">Tejgaon, Dhaka-1208.</p>
            <div class="subtitle" style="text-align: center; font-weight: bold; font-size: 22px; margin-bottom: 10px;">Admit Card of Admission Test</div>
            <p style="text-align: center; font-size: 20px; font-weight: bold;">M. Sc. in Textile Engineering /<br>M. Sc. in Sustainability in Textiles Program</p>
            <p style="text-align: center; font-size: 20px; font-weight: bold;">(Session: 2024)</p>
        </div>
        <div style="width: 25%; margin-top: 20px;">
            <div class="third_page_box"  style="border: 1px solid #000; font-size: 18px; padding: 5px; margin-bottom: 10px;">
               <b> Admission Test Roll No: <br/> {{ @$data->data1 }}</b>
            </div>
            <div class="photo-box"
                style="display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-left: 10px;">
                <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 200px; height: 200px;" alt="">
            </div>
        </div>
    </div>
    

    <div class="info">
        <div class="details">
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">1. Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data2 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">2. Father’s Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data3 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">3. Mother’s Name :</label>
                <p style="width: 74%; font-size: 18px;"><span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data4 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">4. Date of Examination :</label>
                <p style="width: 74%; font-size: 18px;"></p>
            </div>
            <div class="input-line" style="display: flex;">
                <label style="width: 25%; font-size: 18px;">5. Name of Exam. Center :</label>
                <p style="width: 74%; font-size: 18px;"> <b>Bangladesh University of Textiles</b></p>
            </div>
            <div class="input-line" style="display: flex;">
                <div class="third_page_part" style="width: 60%; display: flex;">
                    <label style="width: 43%; font-size: 18px;">6.Signature of Applicant :</label>
                    <p style="width: 50%;"> <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt=""> </p>
                </div>
                <div class="third_page_second_part" style="width: 39%">
                    <p style="padding: 0px 40px; font-size: 20px; font-weight: bold;">Responsible Officer</p>
                    <p style="padding: 0; margin: 0; font-size: 19px;">Admission Co-ordination Committee</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p style="font-size: 19px; padding: 10px; text-align: center;"><b>N.B.:</b>
        (1) No candidate will be allowed after 30 minutes from the start of examination.
        (2) Applicant must bring admit card, pen, pencil, Geometry box.
        (3) Non-programmable calculator can be used.
        (4) Mobile phone will not be allowed in the examination hall.
    </p>    
</div>
{{-- end 3rd page --}}

