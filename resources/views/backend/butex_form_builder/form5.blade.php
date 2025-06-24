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
</style>

<div class="container-fluid bn">
    <div class="row">
        <div class="col-sm-3">
            <div style="text-align: center">
                <img src="{{ asset('/logo.png') }}" style="width: 130px; height: 120px;" alt="">
            </div>
        </div>
        <div class="col-sm-6">
            <h2 style="text-align: center; font-weight: 600;">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</h2>
            <h4 style="text-align: center; font-weight: 600;">তেজগাঁও, ঢাকা-১২০৮।</h4>
            <h5 style="text-align: center; margin-top: 20px; font-weight: 600;">বোর্ড বৃত্তিপ্রাপ্ত শিক্ষার্থীর তথ্য ফরমঃ</h5>
        </div>
        <div class="col-sm-3">
           
        </div>
    </div>

    <table class="bn" style="">
        <tr>
            <td style="width: 150px; font-size: 16px; text-align: center; font-weight: 600;">ভর্তির শিক্ষাবর্ষ</td>
            <td style="text-align: center; font-weight: 600;">অর্থ বছর</td>
            <td style="text-align: center; font-weight: 600;">বৃত্তির পরীক্ষা</td>
            <td style="text-align: center; font-weight: 600;">বৃত্তির ধরন</td>
            <td style="text-align: center; font-weight: 600;">অধ্যয়নরত লেভেল ও টার্ম</td>
        </tr>
        <tr>
            <td style="text-align: center; font-weight: 600;">{{ @$data->data1 }}</td>
            <td style="text-align: center; font-weight: 600;">{{ @$data->data2 }}</td>
            <td style="text-align: center; font-weight: 600;">{{ @$data->data3 }}</td>
            <td style="text-align: center; font-weight: 600;">{{ @$data->data4 }}</td>
            <td style="text-align: center; font-weight: 600;">{{ @$data->data5 }}</td>
        </tr>
    </table>

    <h5 style="margin-top: 15px; font-weight: 600;">(ব্যক্তিগত তথ্য):</h5>

    <table class="bn">
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">শিক্ষার্থীর নাম (বাংলা)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data6 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">শিক্ষার্থীর নাম (ইংরেজী)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data7 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">পিতার নাম (বাংলা)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data8 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">পিতার নাম (ইংরেজী)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data9 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">মাতার নাম (বাংলা)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data10 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">মাতার নাম (ইংরেজী)</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data11 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">শিক্ষার্থীর জেন্ডার</td>
            <td style="border: none; font-weight: 600;">:<span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data12 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">শিক্ষার্থীর জন্ম তারিখ</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data13 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">শিক্ষার্থীর ফোন নম্বর</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data14 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>.</td>
        </tr>
    </table>

    <h5 style="margin-top: 15px; font-weight: 600;">স্থায়ী ঠিকানাঃ</h5>
    <table class="bn">
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">বিভাগঃ</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data15 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> জেলাঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data16 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>  উপজেলা: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data17 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
    </table>

    <h5 style="margin-top: 15px; font-weight: 600;">শিক্ষা সংক্রান্ত তথ্য (পূর্ববর্তী শিক্ষাগত তথ্য):</h5>

    <p style="font-size: 17px; font-weight: 600;">পূর্ববর্তী শিক্ষার নামঃ এইচএসসি, রেজিষ্ট্রেশন নম্বর: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data18 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
    
    <table class="bn">
        <tr>
            <td style="border: none; width: 200px; font-weight: 600;">ফলাফলঃ</td>
            <td style="border: none; font-weight: 600;">: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data19 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> উত্তীর্ণ হওয়ার বছর: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data20 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
    </table>
    
    <h5 style="margin-top: 15px; font-weight: 600;">(বর্তমান শিক্ষাগত তথ্য):</h5>

    <div class="font-17" style="padding: 5px; margin-top: 5px; font-weight: 600;">বিভাগ: ঢাকা, জেলা: ঢাকা, উপজেলা: তেজগাঁও থানা</div>
    <div class="font-17" style="padding: 5px; margin-top: 5px; font-weight: 600;">প্রতিষ্ঠানের নাম: বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়, লেভেল ও টার্মঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data21 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-17" style="padding: 5px; margin-top: 5px; font-weight: 600;">শিক্ষার্থীর আইডি নম্বর: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data22 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>
    <div class="font-17" style="padding: 5px; margin-top: 5px; font-weight: 600;">শিক্ষার্থীর বিভাগের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data23 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>


    <h5 style="margin-top: 15px; font-weight: 600;">(অভিভাবকের তথ্য):</h5>
    <table class="bn">
        <tr>
            <td style="border: none; font-weight: 600;">সম্পর্ক: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data24 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
            <td style="border: none; font-weight: 600;">স্থায়ী ঠিকানা</td>
        </tr>
        <tr>
            <td style="border: none; font-weight: 600;">নাম (বাংলা): <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data25 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
            <td style="border: none; font-weight: 600;">বিভাগ: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data27 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; font-weight: 600;">নাম (ইংরেজী): <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data26 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
            <td style="border: none; font-weight: 600;">জেলা: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data28 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
        <tr>
            <td style="border: none; font-weight: 600;">মোবাইল নম্বর: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data29 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
            <td style="border: none; font-weight: 600;">উপজেলা: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data30 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></td>
        </tr>
    </table>

    <h5 style="margin-top: 15px; font-weight: 600;">(পেমেন্টের তথ্য):</h5>
    <p class="font-17" style="padding: 5px; font-weight: 600;">পেমেন্টের ধরনঃ ব্যাংকিং, ব্যাংকের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data31 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> শাখাঃ <span class="border_custom"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data32 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> রাউটিং নাম্বার: <span class="border_custom"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data33 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
    <span class="border_custom">হিসাবের ধরন : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data34 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> হিসাবধারীর নাম : <span class="border_custom"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data35 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> হিসাব নংঃ <span class="border_custom"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data36 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
    </p>

   
</div>


