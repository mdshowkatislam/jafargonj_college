<table class="bn">
    <tr>
        <td>ভর্তির শিক্ষাবর্ষ</td>
        <td>{{ @$data->data1 }}</td>
        <td>অর্থ বছর</td>
        <td>{{ @$data->data2 }}</td>
    </tr>
    <tr>
        <td>বৃত্তির পরীক্ষা</td>
        <td>{{ @$data->data3 }}</td>
        <td>বৃত্তির ধরন</td>
        <td>{{ @$data->data4 }}</td>
    </tr>
    <tr>
        <td>অধ্যয়নরত লেভেল ও টার্ম</td>
        <td colspan="3">{{ @$data->data5 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">(ব্যক্তিগত তথ্য)</h5>

<table class="bn">
    <tr>
        <td>শিক্ষার্থীর নাম (বাংলা)</td>
        <td>{{ @$data->data6 }}</td>
        <td>শিক্ষার্থীর নাম (ইংরেজী)</td>
        <td>{{ @$data->data7 }}</td>
    </tr>
    <tr>
        <td>পিতার নাম (বাংলা)</td>
        <td>{{ @$data->data8 }}</td>
        <td>পিতার নাম (ইংরেজী)</td>
        <td>{{ @$data->data9 }}</td>
    </tr>
    <tr>
        <td>মাতার নাম (বাংলা)</td>
        <td>{{ @$data->data10 }}</td>
        <td>মাতার নাম (ইংরেজী)</td>
        <td>{{ @$data->data11 }}</td>
    </tr>
    <tr>
        <td>শিক্ষার্থীর জেন্ডার</td>
        <td>{{ @$data->data12 }}</td>
        <td>শিক্ষার্থীর জন্ম তারিখ</td>
        <td>{{ @$data->data13 }}</td>
    </tr>
    <tr>
        <td>শিক্ষার্থীর ফোন নম্বর</td>
        <td>{{ @$data->data14 }}</td>
        <td></td>
        <td></td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">স্থায়ী ঠিকানাঃ</h5>

<table class="bn">
    <tr>
        <td>বিভাগ</td>
        <td>{{ @$data->data15 }}</td>
        <td>জেলা</td>
        <td>{{ @$data->data16 }}</td>
    </tr>
    <tr>
        <td>উপজেলা</td>
        <td>{{ @$data->data17 }}</td>
        <td></td>
        <td></td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">শিক্ষা সংক্রান্ত তথ্য (পূর্ববর্তী শিক্ষাগত তথ্য)</h5>

<table class="bn">
    <tr>
        <td>পূর্ববর্তী শিক্ষার নামঃ এইচএসসি, রেজিষ্ট্রেশন নম্বর</td>
        <td colspan="3">{{ @$data->data18 }}</td>
    </tr>
    <tr>
        <td>ফলাফল</td>
        <td>{{ @$data->data19 }}</td>
        <td>উত্তীর্ণ হওয়ার বছর</td>
        <td>{{ @$data->data20 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">(বর্তমান শিক্ষাগত তথ্য):</h5>
<h6 class="p-1 bn mt-2">বিভাগ: ঢাকা, জেলা: ঢাকা, উপজেলাঃ তেজগাঁও থানা।</h6>

<table class="bn">
    <tr>
        <td>প্রতিষ্ঠানের নাম: বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়, লেভেল ও টার্ম </td>
        <td colspan="3">{{ @$data->data21 }}</td>
    </tr>
    <tr>
        <td>শিক্ষার্থীর আইডি নম্বর</td>
        <td>{{ @$data->data22 }}</td>
        <td>শিক্ষার্থীর বিভাগের নাম</td>
        <td>{{ @$data->data23 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">(অভিভাবকের তথ্য)</h5>

<table class="bn">
    <tr>
        <td>সম্পর্ক </td>
        <td>{{ @$data->data24 }}</td>
        <td>বিভাগ </td>
        <td>{{ @$data->data28 }}</td>
    </tr>
    <tr>
        <td>নাম (বাংলা)</td>
        <td>{{ @$data->data25 }}</td>
        <td>জেলা </td>
        <td>{{ @$data->data29 }}</td>
    </tr>
    <tr>
        <td>নাম (ইংরেজী)</td>
        <td>{{ @$data->data26 }}</td>
        <td>উপজেলা </td>
        <td>{{ @$data->data30 }}</td>
    </tr>
    <tr>
        <td>মোবাইল নম্বর</td>
        <td>{{ @$data->data27 }}</td>
        <td></td>
        <td></td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">(পেমেন্টের তথ্য)</h5>

<table class="bn">
    <tr>
        <td>পেমেন্টের ধরনঃ ব্যাংকিং, ব্যাংকের নাম</td>
        <td colspan="3">{{ @$data->data31 }}</td>
    </tr>
    <tr>
        <td>শাখা</td>
        <td>{{ @$data->data32 }}</td>
        <td>রাউটিং নাম্বার</td>
        <td>{{ @$data->data33 }}</td>
    </tr>
    <tr>
        <td>হিসাবের ধরন</td>
        <td>{{ @$data->data34 }}</td>
        <td>হিসাবধারীর নাম</td>
        <td>{{ @$data->data35 }}</td>
    </tr>
    <tr>
        <td>হিসাব নং</td>
        <td>{{ @$data->data36 }}</td>
        <td></td>
        <td></td>
    </tr>
</table>
