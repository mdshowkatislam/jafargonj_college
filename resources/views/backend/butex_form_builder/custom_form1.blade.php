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
        <td>পরীক্ষার্থীর পূর্ণ নাম (বাংলায়)</td>
        <td>{{ @$data->data1 }}</td>
        <td>পরীক্ষার্থীর পূর্ণ নাম (ইংরেজী বড় অক্ষরে)</td>
        <td>{{ @$data->data2 }}</td>
    </tr>
    <tr>
        <td>পিতার নাম</td>
        <td>{{ @$data->data3 }}</td>
        <td>মাতার নাম</td>
        <td>{{ @$data->data4 }}</td>
    </tr>
    <tr>
        <td>স্থায়ী ঠিকানা গ্রামঃ</td>
        <td>{{ @$data->data5 }}</td>
        <td>পোঃ</td>
        <td>{{ @$data->data6 }}</td>
    </tr>
    <tr>
        <td>থানা/উপজেলা</td>
        <td>{{ @$data->data7 }}</td>
        <td>জেলা</td>
        <td>{{ @$data->data8 }}</td>
    </tr>
    <tr>
        <td>জন্ম তারিখ (এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)</td>
        <td>{{ @$data->data9 }}</td>
        <td>জাতীয়তা</td>
        <td>{{ @$data->data10}}</td>
    </tr>
    <tr>
        <td>ধর্ম</td>
        <td>{{ @$data->data11 }}</td>
        <td>বর্ণ/সম্প্রদায়</td>
        <td>{{ @$data->data12 }}</td>
    </tr>
    <tr>
        <td>এসএসসি/সমমান পরীক্ষা পাশের সন</td>
        <td>{{ @$data->data13 }}</td>
        <td>রোল নং</td>
        <td>{{ @$data->data14 }}</td>
    </tr>
    <tr>
        <td>ফলাফল</td>
        <td>{{ @$data->data15 }}</td>
        <td>বোর্ডের নাম</td>
        <td>{{ @$data->data16 }}</td>
    </tr>
    <tr>
        <td>শিক্ষা প্রতিষ্ঠানের নাম</td>
        <td>{{ @$data->data17 }}</td>
        <td>এইচএসসি/সমমান পরীক্ষা পাশের সন</td>
        <td>{{ @$data->data18 }}</td>
    </tr>
    <tr>
        <td>রোল নং</td>
        <td>{{ @$data->data19 }}</td>
        <td>ফলাফল</td>
        <td>{{ @$data->data20 }}</td>
    </tr>
    <tr>
        <td>বোর্ডের নাম</td>
        <td>{{ @$data->data21 }}</td>
        <td>শিক্ষা প্রতিষ্ঠানের নাম</td>
        <td>{{ @$data->data22 }}</td>
    </tr>
    <tr>
        <td>পরীক্ষার্থী বিশ্ববিদ্যালয়ের কোন পরীক্ষায় অংশগ্রহন করে কখনও বহিষ্কৃত হয়ে থাকলে, শান্তির মেয়াদ</td>
        <td></td>
        <td>পরীক্ষার নাম</td>
        <td>{{ @$data->data23 }}</td>
    </tr>
    <tr>
        <td>লেভেল</td>
        <td>{{ @$data->data24 }}</td>
        <td>টার্ম</td>
        <td>{{ @$data->data25 }}</td>
    </tr>
    <tr>
        <td>পরীক্ষার সন</td>
        <td>{{ @$data->data26 }}</td>
        <td>শান্তির মেয়াদ</td>
        <td>{{ @$data->data27 }}</td>
    </tr>
</table>

<h5 class="p-1 bn mt-2">পরীক্ষায় অবতীর্ণ হওয়ার বিষয় কোড ও বিষয়</h5>

<table class="bn">
    <tr>
        <th>ক্রম</th>
        <th>বিষয় কোড</th>
        <th>বিষয়ের নাম</th>
        <th>ক্রম</th>
        <th>বিষয় কোড</th>
        <th>বিষয়ের নাম</th>
    </tr>
    <tr>
        <td>১.</td>
        <td>{{ @$data->data28 }}</td>
        <td>{{ @$data->data29 }}</td>
        <td>৮.</td>
        <td>{{ @$data->data30 }}</td>
        <td>{{ @$data->data31 }}</td>
    </tr>
    <tr>
        <td>২.</td>
        <td>{{ @$data->data32 }}</td>
        <td>{{ @$data->data33 }}</td>
        <td>৯.</td>
        <td>{{ @$data->data34 }}</td>
        <td>{{ @$data->data35 }}</td>
    </tr>
    <tr>
        <td>৩.</td>
        <td>{{ @$data->data36 }}</td>
        <td>{{ @$data->data37 }}</td>
        <td>১০.</td>
        <td>{{ @$data->data38 }}</td>
        <td>{{ @$data->data39 }}</td>
    </tr>
    <tr>
        <td>৪.</td>
        <td>{{ @$data->data40 }}</td>
        <td>{{ @$data->data41 }}</td>
        <td>১১.</td>
        <td>{{ @$data->data42 }}</td>
        <td>{{ @$data->data43 }}</td>
    </tr>
    <tr>
        <td>৫.</td>
        <td>{{ @$data->data44 }}</td>
        <td>{{ @$data->data45 }}</td>
        <td>১২.</td>
        <td>{{ @$data->data46 }}</td>
        <td>{{ @$data->data47 }}</td>
    </tr>
    <tr>
        <td>৬.</td>
        <td>{{ @$data->data48 }}</td>
        <td>{{ @$data->data49 }}</td>
        <td>১৩.</td>
        <td>{{ @$data->data50 }}</td>
        <td>{{ @$data->data51 }}</td>
    </tr>
    <tr>
        <td>৭.</td>
        <td>{{ @$data->data52 }}</td>
        <td>{{ @$data->data53 }}</td>
        <td>১৪.</td>
        <td>{{ @$data->data54 }}</td>
        <td>{{ @$data->data55 }}</td>
    </tr>

</table>